<!DOCTYPE html>
<html lang="en">
<head>
<?php

include '../header.php';

?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="grid/simple-grid.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        select, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        select {
            height: 150px; 
        }
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
    <title>Cardápio</title>
</head>
<body>
    <div class="container">
        <h1>Cadastro de Cardápios</h1>
        <form action="acaocardapioalimento.php" method="post">
            <?php
            require_once('../conf/Conexao.php');
            $conexao = Conexao::getInstance();
            $alimentos = $conexao->query("SELECT * FROM alimentos;");
            $cardapios = $conexao->query("SELECT * FROM cardapio;");
            ?>
            <select name="alimento_id[]" id="alimento_id" multiple>
                <?php
                while($linha = $alimentos->fetch(PDO::FETCH_ASSOC)){
                    echo '<option value="'. $linha['idalimentos'].'">'.$linha['alimento'].'</option>';
                }
                ?>
            </select>

            <select name="cardapio_id" id="cardapio_id">
                <?php
                
                while($linha = $cardapios->fetch(PDO::FETCH_ASSOC)){
                    $dataFormatada = date_create($linha['data'])->format('d/m/Y');
                    echo '<option value="'. $linha['idcardapio'].'">'.$dataFormatada.'</option>';
                }
                ?>
        
            </select>
            <button type="submit" value="salvar" name="acao" id="acao" style="background-color: #28a745; color: #fff;">Salvar</button>

        </form>
    </div