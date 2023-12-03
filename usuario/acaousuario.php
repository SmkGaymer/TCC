<?php
require_once "../conf/Conexao.php";
require_once "usuario.class.php";

$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : '';

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
?>
