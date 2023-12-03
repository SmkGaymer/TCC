<?php
$idalimentos = isset($_REQUEST['idalimentos']) ? $_REQUEST['idalimentos'] : 0;
$alimento = isset($_POST['alimento']) ? $_POST['alimento'] : '';
$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : '';

require_once('../alimentos/alimento.class.php');

if ($acao == 'salvar') {
    try {
        $alimento = new Alimento($idalimentos, $alimento);

        if ($idalimentos > 0) {
            $alimento->editar();
        } else {
            $alimento->inserir();
        }
        header('location:show.php');
        exit();
    } catch (Exception $e) {
        echo "Erro ao inserir/editar: " . $e->getMessage();
    }
} elseif ($acao == 'excluir') {
    try {
        $alimento = new Alimento($idalimentos, '');

        if ($alimento->excluir()) {
            
            header('location:show.php');
            exit();
        } else {
            
            echo "Falha ao excluir o alimento.";
        }
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>
