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
    </style>
    
</head>
<body>
    
    <div class="cardapio-container">
        <h1>Cardápio do dia</h1>
        <?php
        $cardapioid = 5;
        require_once('../conf/Conexao.php');
        $conexao = Conexao::getInstance();
        
        $consulta2 = $conexao->query('Select * FROM cardapio WHERE idcardapio ='.$cardapioid);
        while($linha = $consulta2->fetch(PDO::FETCH_ASSOC)){
            
         
            $dia_semana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado');
            $data_formatada = date('d/m/Y', strtotime($linha['data']));
            $dia_semana_formatado = $dia_semana[date('w', strtotime($linha['data']))];
            echo "<h1 class='data-formatada'> ".$dia_semana_formatado." (".$data_formatada.")</h1>";
        }

        $consulta = $conexao->query("SELECT cardapio_alimento.*, cardapio.data, alimentos.alimento FROM cardapio_alimento join
        cardapio on cardapio.idcardapio = cardapio_alimento.cardapio_id join
        alimentos on alimentos.idalimentos = cardapio_alimento.alimento_id
        WHERE cardapio_id =". $cardapioid.";");

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
        <p class="mensagem" id="mensagem">Almoço contado com sucesso!</p>
        <button id="contadorBtn" class="btn btn-success">Sim</button>
        <button id="fodase" class="btn btn-danger-custom">Não</button>
        <p class="contador" id="contador">0</p>
    </div>
    
    <script>
        function excluir() {
            return confirm('Tem certeza que deseja excluir este registro?');
        }

        var contador = 0;
        var contadorElement = document.getElementById("contador");
        var contadorBtn = document.getElementById("contadorBtn");
        var fodaseBtn = document.getElementById("fodase");
        var mensagemElement = document.getElementById("mensagem");

        contadorBtn.addEventListener("click", function() {
            contador++;
            contadorElement.textContent = contador;
            exibirMensagem();
        });

        fodaseBtn.addEventListener("click", function() {
            exibirMensagem();
        });

        function exibirMensagem() {
            contadorBtn.style.display = "none";
            fodaseBtn.style.display = "none";
            mensagemElement.style.display = "block";
        }
    </script>
</body>
</html>
