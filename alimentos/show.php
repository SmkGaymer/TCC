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
        <h2>Lista de Alimentos</h2>
        <form action="" method="get" class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" name="filtro" placeholder="Pesquisar por alimento">
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </div>
        </form>
        <a class="btn btn-success mb-3" href="cad.php">Cadastrar Novo Alimento</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Alimento</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conexao = Conexao::getInstance();
                $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : "";
                $consulta = $conexao->query("SELECT * FROM alimentos WHERE alimento LIKE '$filtro%';");
                while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr>
                    <td>".$linha["idalimentos"]."</td>
                    <td>".$linha["alimento"]."</td>
                    <td>
                        <a class='btn btn-danger btn-sm' onClick='return excluir();' href='acaoalimento.php?acao=excluir&idalimentos=".$linha['idalimentos']."'>Excluir</a>
                        <a class='btn btn-warning btn-sm' href='acaoalimento.php?acao=editar&idalimentos=".$linha['idalimentos']."'>Editar</a>
                    </td>
                    </tr>\n";
                }
                ?>  
            </tbody>
        </table>
    </div>
</body>
</html>