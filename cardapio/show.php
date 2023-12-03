<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar</title>
    <?php include '../header.php'; 
    require_once "../conf/Conexao.php";?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Datas das Refeições</h2>
        <form action="" method="get" class="mb-3">
            <div class="input-group">
                <input type="date" class="form-control" name="filtro" placeholder="Pesquisar por data" value="<?php echo isset($_GET['filtro']) ? $_GET['filtro'] : ''; ?>">
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </div>
        </form>
        <a class="btn btn-success mb-3" href="cad.php">Cadastrar Nova Data</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Data</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conexao = Conexao::getInstance();
                $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : "";
                
                // Verifica se o filtro está vazio para exibir todas as datas
                $condicaoFiltro = empty($filtro) ? "" : "WHERE DATE_FORMAT(data, '%Y-%m-%d') = '$filtro'";
                
                // Alteração na consulta para filtrar pelo dia, se houver um filtro
                $consulta = $conexao->query("SELECT * FROM cardapio $condicaoFiltro;");

                while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                    $dataFormatada = date('d/m/Y', strtotime($linha["data"]));
                    echo "<tr>
                    <td>".$linha["idcardapio"]."</td>
                    <td>".$dataFormatada."</td>
                    <td>
                        <a class='btn btn-danger btn-sm' href='acaocardapio.php?acao=excluir&idcardapio=".$linha['idcardapio']."'>Excluir</a>
                        <a class='btn btn-warning btn-sm' href='cad.php?acao=editar&idcardapio=".$linha['idcardapio']."'>Editar</a>
                    </td>
                    </tr>\n";
                }
                ?>  
            </tbody>
        </table>
    </div>
</body>
</html>
