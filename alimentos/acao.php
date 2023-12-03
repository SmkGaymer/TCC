<?php
require_once "../conf/Conexao.php";
require_once('../classes/database.class.php');
    
$acao = "";
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
        break;
    case 'POST':
        $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
        break;
}

switch ($acao) {
    case 'excluir':
        excluir();
        break;
    case 'salvar': {
        $idalimentos = isset($_POST['idalimentos']) ? $_POST['idalimentos'] : 0;
        if ($idalimentos > 0)
            editar();
        else
            salvar();
        break;
    }
}

function editar() {
    $dados = formToArray();
    $conexao = Conexao::getInstance();
    $stmt = $conexao->prepare("UPDATE alimentos SET alimento = ? WHERE idalimentos = ?");
    $stmt->bindParam(':idalimentos', $idalimentos, PDO::PARAM_INT);
    $stmt->execute([$dados['alimento']]);
    header("location:show.php");
}

function salvar() {
    $dados = formToArray();
    $conexao = Conexao::getInstance();
    $stmt = $conexao->prepare("INSERT INTO alimentos (alimento) VALUES (?)");
    $stmt->execute([$dados['alimento']]);
    header("location:show.php");
}

function excluir() {
    $idalimentos = isset($_GET['idalimentos']) ? $_GET['idalimentos'] : 0;
    $conexao = Conexao::getInstance();
    $stmt = $conexao->prepare("DELETE FROM alimentos WHERE idalimentos = :idalimentos");
    $stmt->bindParam(':idalimentos', $idalimentos, PDO::PARAM_INT);
    $stmt->execute();
    header("location:show.php");
}

function formToArray() {
    $idalimentos = isset($_POST['idalimentos']) ? $_POST['idalimentos'] : 0;
    $alimento = isset($_POST['alimento']) ? $_POST['alimento'] : "";
    
    $dados = array(
        'idalimentos' => $idalimentos,
        'alimento' => $alimento
    );

    return $dados;
}

function findById($idalimentos) {
    $conexao = Conexao::getInstance();
    $stmt = $conexao->prepare("SELECT * FROM alimentos WHERE idalimentos = ?");
    $stmt->execute([$idalimentos]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result; 
}
?>



?>