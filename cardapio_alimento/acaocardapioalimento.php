<?php
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
$alimentos = isset($_POST['alimento_id']) ? $_POST['alimento_id'] : '';
$cardapio_id = isset($_POST['cardapio_id']) ? $_POST['cardapio_id'] : '';
$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : '';
var_dump(['alimento'=> $alimento_id, 'cardapio' => $cardapio_id]);
require_once('cardapioalimento.class.php');

if ($acao == 'salvar') {
    try {
        foreach($alimentos as $alimento_id){

        
            $cardapio_alimento = new Cardapioalimento($id, $cardapio_id, $alimento_id);

            if ($id > 0) {
                $cardapio_alimento->editar();
            } else {
                $cardapio_alimento->inserir();
            }
        }
        header('location:show.php?id='.$id);
        exit();
    } catch (Exception $e) {
        echo "Erro ao inserir/editar: " . $e->getMessage();
    }
} elseif ($acao == 'excluir') {
    try {
        $cardapio_alimento = new Cardapioalimento($id, '', '');

        if ($cardapio_alimento->excluir()) {
           
            header('location:show.php?id='.$id);
            exit();
        } else {
            
            echo "Falha ao excluir o cardapio_alimento.";
        }
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>
