<?php
require_once "../conf/Conexao.php";
require_once "usuario.class.php";

$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : '';
function findById($idusuario) {
    $conexao = Conexao::getInstance();
    $stmt = $conexao->prepare("SELECT * FROM usuario WHERE idusuario = ?");
    $stmt->execute([$idusuario]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result; 
}

if ($acao == 'salvar') {
    try {
        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $matricula = isset($_POST['matricula']) ? $_POST['matricula'] : '';
        $nascimento = isset($_POST['nascimento']) ? $_POST['nascimento'] : '';
        $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
        $turma = isset($_POST['turma']) ? $_POST['turma'] : '';
        $senha = isset($_POST['senha']) ? $_POST['senha'] : '';  // Ajuste para pegar a senha
        $alergias = isset($_POST['alergias']) ? $_POST['alergias'] : '';
        $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';

        // Hash da senha
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $usuario = new Usuario(0, $nome, $matricula, $nascimento, $sexo, $turma, $senhaHash, $alergias, $cpf);

        if ($idusuario > 0) {
            $usuario->editar();
        } else {
            $usuario->inserir();
        }
        header('location: ../index.php');
        exit();
    } catch (Exception $e) {
        echo "Erro ao inserir: " . $e->getMessage();
    }
} elseif ($acao == 'excluir') {
    try {
        $idusuario = isset($_GET['idusuario']) ? $_GET['idusuario'] : '';

        if (!empty($idusuario)) {
            $usuario = new Usuario($idusuario, '', '', '', '', '', '', '', '');
            $usuario->excluir();

            // Redireciona para a página de visualização após a exclusão
            header('location: show.php');
            exit();
        }
    } catch (Exception $e) {
        echo "Erro ao excluir: " . $e->getMessage();
    }
} else {
    // Redireciona para a página de login se a ação não for 'salvar' ou 'excluir'
    header('location: ../index.php');
    exit();
}
?>
