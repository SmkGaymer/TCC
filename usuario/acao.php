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
