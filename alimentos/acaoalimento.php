<?php
$idalimentos = isset($_REQUEST['idalimentos']) ? $_REQUEST['idalimentos'] : 0;
$alimento = isset($_POST['alimento']) ? $_POST['alimento'] : '';
$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : '';

require_once('alimento.class.php');

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
} elseif ($acao == 'editar') {
    // Adicione mensagens de depuração
    echo "Ação de Edição acionada. ID: " . $idalimentos;

    // Recupere os dados do alimento para exibição no formulário de edição
    $conexao = Conexao::getInstance();
    $consulta = $conexao->query("SELECT * FROM alimentos WHERE idalimentos = $idalimentos");
    $dadosAlimento = $consulta->fetch(PDO::FETCH_ASSOC);
    // Adicione o código para exibir o formulário de edição com os dados do alimento
    // Certifique-se de incluir o formulário HTML com os campos preenchidos com os dados recuperados.
}
?>
