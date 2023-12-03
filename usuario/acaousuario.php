<?php
require_once "../conf/Conexao.php";
require_once "usuario.class.php";

$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : '';

// Carregar dados do usuário para edição
if ($acao == 'editar') {
    $idusuario = isset($_GET['idusuario']) ? $_GET['idusuario'] : 0;
    $dados = findById($idusuario);

    // Verificar se o usuário existe
    if (!$dados) {
        echo "Usuário não encontrado.";
        exit();
    }
}

if ($acao == 'salvar') {
    try {
        $idusuario = isset($_POST['idusuario']) ? $_POST['idusuario'] : 0;
        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $matricula = isset($_POST['matricula']) ? $_POST['matricula'] : '';
        $nascimento = isset($_POST['nascimento']) ? $_POST['nascimento'] : '';
        $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
        $turma = isset($_POST['turma']) ? $_POST['turma'] : '';
        $senha = isset($_POST['senha']) ? $_POST['senha'] : '';
        $alergias = isset($_POST['alergias']) ? $_POST['alergias'] : '';
        $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';

        $usuario = new Usuario($idusuario, $nome, $matricula, $nascimento, $sexo, $turma, $senha, $alergias, $cpf);

        if ($idusuario > 0) {
            $usuario->editar();
        } else {
            $usuario->inserir();
        }
        header('location:show.php');
        exit();
    } catch (Exception $e) {
        echo "Erro ao inserir/editar: " . $e->getMessage();
    }
} elseif ($acao == 'excluir') {
    try {
        $idusuario = isset($_GET['idusuario']) ? $_GET['idusuario'] : 0;
        $usuario = new Usuario($idusuario, '', '', '', '', '', '', '', '');

        if ($usuario->excluir()) {
            header('location:show.php');
            exit();
        } else {
            echo "Falha ao excluir o usuário.";
        }
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}

// Restante do código para exibir o formulário de edição
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <?php include '../header.php'; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Usuário</h2>
        <form action="acaousuario.php" method="post">
            <input type="hidden" name="idusuario" value="<?php echo $dados['idusuario']; ?>">
            <!-- Adicione os campos restantes aqui -->
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $dados['nome']; ?>">
            </div>
            <!-- Adicione os outros campos do formulário -->
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</body>
</html>


<?php
require_once "../conf/Conexao.php";
require_once('../classes/database.class.php');

function findById($idusuario) {
    $conexao = Conexao::getInstance();
    $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE idusuario = ?");
    $stmt->execute([$idusuario]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result; 
}
?>
