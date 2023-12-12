
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "conf/Conexao.php";

    $matricula = isset($_POST["matricula"]) ? $_POST["matricula"] : "";
    $senha = isset($_POST["senha"]) ? $_POST["senha"] : "";

    if (!empty($matricula) && !empty($senha)) {
        $conexao = new PDO(MYSQL_DSN, MYSQL_USUARIO, MYSQL_SENHA);

        $query = "SELECT * FROM usuario WHERE matricula = :matricula";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':matricula', $matricula);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verifica se a senha está correta usando password_verify
            if (password_verify($senha, $usuario['senha'])) {
                $_SESSION["matricula"] = $matricula;
                header("Location: usuario/show.php");
                exit();
            } else {
                $erro_login = "Matrícula ou senha inválidos";
            }
        } else {
            $erro_login = "Matrícula ou senha inválidos";
        }

        $conexao = null;
    } else {
        $erro_login = "Informe a matrícula e a senha";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="shortcut icon" href="img/favicon.ico"/>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>    
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div>
            <div class="h1">
                <h1>Cardápio IFC</h1>
            </div>
            <div class="h2">
                <h2>Campus Rio do Sul</h2>
            </div>
            <div class="login">
                <img src="img/logo.png" width="180px" alt="ifc" srcset="">
                <form action="" method="post" class="text-center">
                    <div class="form-group">
                        <input type="text" class="form-control" id="matricula" name="matricula" aria-describedby="emailHelp" placeholder="Matrícula">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="senha" name="senha" aria-describedby="emailHelp" placeholder="Senha">
                    </div>
                    <div class="mt-3">
                        <input type="submit" class="btn btn-success" value="Login">
                        <a href="criarconta/index.php" class="btn btn-outline-success">Criar Conta</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>