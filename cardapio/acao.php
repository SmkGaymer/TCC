<?php
require_once "../conf/Conexao.php";
    
$acao = "";
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
        break;
    case 'POST':
        $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
        break; //**** */
}

switch ($acao) {
    case 'excluir':
        excluir();
        break;
    case 'salvar': {
        $idcardapio = isset($_POST['idcardapio']) ? $_POST['idcardapio'] : 0;
        if ($idcardapio > 0)
            editar();
        else
            salvar();
        break;
    }
}

function editar() {
    $dados = formToArray();
    $conexao = Conexao::getInstance();
    $stmt = $conexao->prepare("UPDATE cardapio SET data = ?, diasemana = ? WHERE idcardapio = ?");
    $stmt->execute([$dados['data'], $dados['diasemana']]);
    header("location:index.php");
}

function salvar() {
    $dados = formToArray();
    $conexao = Conexao::getInstance();
    $stmt = $conexao->prepare("INSERT INTO cardapio (data, diasemana
    ) VALUES (?, ?)");
    $stmt->execute([$dados['data'], $dados['diasemana']]);
    header("location:index.php");
}

function excluir() {
    $idcardapio = isset($_GET['idcardapio']) ? $_GET['idcardapio'] : 0;
    $conexao = Conexao::getInstance();
    $stmt = $conexao->prepare("DELETE FROM cardapio WHERE idcardapio = :idcardapio");
    $stmt->bindParam(':idcardapio', $idcardapio, PDO::PARAM_INT);
    $stmt->execute();
    header("location:index.php");
}

function formToArray() {
    $idcardapio = isset($_POST['idcardapio']) ? $_POST['idcardapio'] : 0;
    $data = isset($_POST['data']) ? $_POST['data'] : "";
    $diasemana = isset($_POST['diasemana']) ? $_POST['diasemana'] : "";
    
    $dados = array(
        'idcardapio' => $idcardapio,
        'data' => $data,
        'diasemana' => $diasemana
    );

    return $dados;
}

function findById($idcardapio) {
    $conexao = Conexao::getInstance();
    $stmt = $conexao->prepare("SELECT * FROM cardapio WHERE idcardapio = ?");
    $stmt->execute([$idcardapio]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result; 
}
?>
