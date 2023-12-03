<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=5.0">
    <title>Document</title>
    <link href="grid/simple-grid.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <?php
    require_once "../conf/Conexao.php";
    include 'acao.php';
    include '../header.php';

    $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
    $dados = array();

    if ($acao == 'editar'){
        $idalimentos = isset($_GET['idalimentos']) ? $_GET['idalimentos'] : '';
        $dados = findById($idalimentos);
    }
    ?>
</head>
<body style="background-color: white; color: black;">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header" style="background-color: #177C33; color: white;">
                <h1 class="text-center">Cadastrar Alimento</h1>
            </div>
            <div class="card-body">
                <form action="acaoalimento.php" method="post">
                    <div class="form-group">
                        <label for="idalimentos">ID:</label>
                        <input type="text" class="form-control" name="idalimentos" id="idalimentos" value="<?php if ($acao == 'editar') echo $dados['idalimentos']; else echo '0'; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="alimento">Alimento:</label>
                        <input type="text" class="form-control" name="alimento" id="alimento" value="<?php if ($acao == 'editar') echo $dados['alimento']; ?>">
                    </div>
                    <input class="btn btn-success" type="submit" value="salvar" name="acao" id="acao">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
