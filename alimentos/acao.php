<?php
require_once "../conf/Conexao.php";
require_once('../classes/database.class.php');
    
function findById($idalimentos) {
    $conexao = Conexao::getInstance();
    $stmt = $conexao->prepare("SELECT * FROM alimentos WHERE idalimentos = ?");
    $stmt->execute([$idalimentos]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result; 
}
?>

