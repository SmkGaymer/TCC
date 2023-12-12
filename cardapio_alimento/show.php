<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Cardápio e Alimentos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <?php
    include "../header.php";
    ?>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .cardapio-container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            border: 5px solid #4CAF50;
            border-radius: 10px;
            text-align: center;
            background-color: #fff;
        }
        .table {
            width: 100%;
        }
        .table th, .table td {
            padding: 10px;
            text-align: center;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .btn-danger {
            padding: 5px 10px;
            font-size: 14px;
        }
        .btn-primary {
            padding: 10px 20px;
            margin: 10px;
        }
        .btn-success {
            background-color: #4CAF50;
            color: #fff;
        }
        .btn-danger-custom {
            background-color: #FF0000;
            color: #fff;
        }
        .mensagem {
            font-size: 24px;
            color: green;
            display: none;
        }
        .data-formatada {
            font-size: 18px;
            margin-top: 10px;
        }
        .btn-verde {
    background-color: #4CAF50;
    color: #fff;
}
    </style>
    
</head>
<body>
    
    <div class="cardapio-container">
        <h1>Cardápio do dia</h1>
        <?php
        $cardapioid = isset($_GET['cardapio_id']) ? $_GET['cardapio_id'] : null;
        require_once('../conf/Conexao.php');
        $conexao = Conexao::getInstance();
        $consulta2q = 'Select * FROM cardapio ';
        if ($cardapioid != null){
            $consulta2q += 'WHERE idcardapio ='.$cardapioid;
        } 
        $consulta2 = $conexao->query($consulta2q);
        while($linha = $consulta2->fetch(PDO::FETCH_ASSOC)){
            
         
            $dia_semana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado');
            $data_formatada = date('d/m/Y', strtotime($linha['data']));
            $dia_semana_formatado = $dia_semana[date('w', strtotime($linha['data']))];
            echo "<h1 class='data-formatada'> ".$dia_semana_formatado." (".$data_formatada.")</h1>";
        }
        $consultaq = 'SELECT cardapio_alimento.*, cardapio.data, alimentos.alimento FROM cardapio_alimento join
        cardapio on cardapio.idcardapio = cardapio_alimento.cardapio_id join
        alimentos on alimentos.idalimentos = cardapio_alimento.alimento_id';
        if($cardapioid != null){
            $consultaq += 'WHERE cardapio_id ='. $cardapioid;
        }
        $consulta = $conexao->query($consultaq);

        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Alimento</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr>
                    <td>".$linha["alimento"]."</td>
                    <td><a class='btn btn-danger' onClick='return excluir();' href='acaocardapioalimento.php?acao=excluir&id=".$linha['id']."'>Excluir</a></td>
                    </tr>\n";
                }
                ?>  
            </tbody>
        </table>
        <br>
        <h1>Você irá comer hoje?</h1>
        <form action="contagem.php" method="post">
        <p class="mensagem" id="mensagem">Almoço contado com sucesso!</p>
        <input type="submit" id="contadorBtn" class="btn btn-verde" name="incrementar" value="Sim">
<button class="btn btn-danger-custom">Não</button> <!-- Removido o atributo onclick -->

<p class="contador" id="contador"></p>
</div>
</form>

<script>
    function excluir() {
        return confirm('Tem certeza que deseja excluir este registro?');
    }

    // Adicionado o evento onclick para o botão "Não"
    document.querySelector('.btn-danger-custom').onclick = function() {
        // Permanece na mesma página
        return false;
    };
</script>
</body>
</html>
