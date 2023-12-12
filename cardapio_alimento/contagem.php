<?php
include_once "../conf/Conexao.php";



// Obter a contagem atual do banco de dados
try {
    $pdo = Conexao::getInstance();
    $sql = "SELECT contagem FROM contador WHERE id = 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $contagemAtual = ($result !== false) ? $result['contagem'] : 0;

    // Manipulação do clique no botão
    if (isset($_POST['incrementar'])) {
        $novaContagem = $contagemAtual + 1;

        // Atualizar a contagem no banco de dados
        $sql = "UPDATE contador SET contagem = :contagem WHERE id = 1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':contagem', $novaContagem, PDO::PARAM_INT);
        $stmt->execute();

        // Atualizar a variável de contagem atual
        $contagemAtual = $novaContagem;
        header('location:show.php');
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>