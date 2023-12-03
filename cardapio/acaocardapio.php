<?php
$idcardapio = isset($_REQUEST['idcardapio']) ? $_REQUEST['idcardapio'] : 0;
$data = isset($_POST['data']) ? $_POST['data'] : '';
$diasemana = isset($_POST['diasemana']) ? $_POST['diasemana'] : '';
$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : '';

require_once('cardapio.class.php');

if ($acao == 'salvar') {
    try {
        $cardapio = new Cardapio($idcardapio, $data, $diasemana);

        if ($idcardapio > 0) {
            $cardapio->editar();
        } else {
            $cardapio->inserir();
        }
        header('location:show.php');
        exit();
    } catch (Exception $e) {
        echo "Erro ao inserir/editar: " . $e->getMessage();
    }
} elseif ($acao == 'excluir') {
    try {
        $cardapio = new Cardapio($idcardapio, '', '');

        if ($cardapio->excluir()) {
            
            header('location:show.php');
            exit();
        } else {
            
            echo "Falha ao excluir o cardápio.";
        }
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>
