<!DOCTYPE html>
<html lang="en">
<head>
    <?php

    require_once "../conf/Conexao.php";
    include 'acaoalimento.php';
    $qeditando = null;
    echo $qeditando;

    if ($idalimentos > 0) {
        $dados = $alimentos->listar(1, $idalimentos);
        if (!empty($dados)) {
            $alimento = $dados[0]['alimento'];
            if ($alimento > 0) {
                $qeditando = new Alimento($dados[0]['idalimentos'], $alimento);
            }
        }
    }

    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alimentos</title>
    <link href="grid/simple-grid.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<body style="background-color: white; color: black;">
    <form action="acaoalimento.php" method="post">
        <div class="container mt-5">
            <div class="card">
                <div class="card-header" style="background-color: #177C33; color: white;">
                    <h1 class="text-center">Cadastro de Alimentos</h1>
                </div>
                <div class="card-body">
                    ID: <input type="text" class="form-control" name="idalimentos" idalimentos="idalimentos" value="<?php echo isset($qeditando) ? $qeditando->getId() : 0 ?>"    readonly> <br>
                    Nome do Alimento: <input type="text" class="form-control "name="alimento" id="alimento"  value="<?php if ($acao == 'editar') echo $dados['alimento']?>" name="alimento" id="alimento" placeholder="alimento:"> <br>
                    <button type="submit" class="btn btn-success" value="salvar" name="acao" id="acao">Salvar</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
