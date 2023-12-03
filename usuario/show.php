<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mostrar Usuários</title>
        <?php include '../header.php'; 
        require_once "../conf/Conexao.php";?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <h2>Lista de Usuários</h2>
            <form action="" method="get" class="mb-3">
                <div class="input-group">
                    <input type="text" class="form-control" name="filtro" placeholder="Pesquisar por nome">
                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                </div>
            </form>
            <a class="btn btn-success mb-3" href="../criarconta/index.php">Cadastrar Novo Usuário</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Códigooo</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Turma</th>
                        <th scope="col">Matrícula</th>
                        <th scope="col">Dat. Nasc</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Alergias</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conexao = Conexao::getInstance();
                    $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : "";
                    $consulta = $conexao->query("SELECT * FROM usuario WHERE nome LIKE '$filtro%';");
                    while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                        echo "<tr>
                        <td>".$linha["idusuario"]."</td>
                        <td>".$linha["nome"]."</td>
                        <td>".$linha["turma"]."</td>
                        <td>".$linha["matricula"]."</td>
                        <td>".$linha["nascimento"]."</td>
                        <td>".$linha["sexo"]."</td>
                        <td>".$linha["cpf"]."</td>
                        <td>".$linha["alergias"]."</td>
                        <td>
                            <a class='btn btn-danger btn-sm' onClick='return excluir();' href='acaousuario.php?acao=excluir&idusuario=".$linha['idusuario']."'>Excluir</a>
                            <a class='btn btn-warning btn-sm' href='acaousuario.php?acao=editar&idusuario=".$linha['idusuario']."'>Editar</a>
                        </td>
                        </tr>\n";
                    }
                    ?>  
                </tbody>
            </table>
        </div>
    </body>
    </html>