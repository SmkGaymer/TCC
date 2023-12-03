<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>    
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;"> <!-- Definir a altura da div para 100% da altura da janela -->
        <div>
            <div class="h1">
                <!--TÍTULO E IMAGEM-->   
                <h1>Cardápio IFC</h1>
            </div>
            <div class="h2">
                <h2>Campus Rio do Sul</h2>
            </div>
            <div class="login">
                <img src="img/logo.png" width="180px" alt="ifc" srcset="">
                <br>

                <!--FORMULÁRIO-->
                <form action="usuario/show.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="matricula" name="matricula" aria-describedby="emailHelp" placeholder="Matrícula">
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="password" class="form-control" id="senha" name="senha" aria-describedby="emailHelp" placeholder="Senha">
                    </div>
                    <br>
                    <br>
                    <input type="submit" class="btn btn-success" value="Login">
                    <button type="submit" formaction="criarconta/index.php" class="btn btn-outline-success">Criar Conta</button>
                </form>
            </div>
        </div>
    </div>
   
</body>
</html>
