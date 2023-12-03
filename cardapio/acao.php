<?php
require_once "../conf/Conexao.php";

function findById($idcardapio) {
    $conexao = Conexao::getInstance();
    $stmt = $conexao->prepare("SELECT * FROM cardapio WHERE idcardapio = ?");
    $stmt->execute([$idcardapio]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result; 
}
?>
