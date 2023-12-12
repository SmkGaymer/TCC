<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../conf/Conexao.php";
    include '../usuario/acao.php';
    $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
    $dados = array();
    if ($acao == 'editar') {
        $idusuario = isset($_GET['idusuario']) ? $_GET['idusuario'] : '';
        $dados = findByid($idusuario);
        //var_dump($dados);
    }
    ?>
    <meta charset="UTF-8">
    <title>Criar Conta</title>
    <link rel="stylesheet" href="../css/criarconta.css">
    <link href="grid/simple-grid.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
</head>

<body>
    <center>
        <div class="cadastro">
            <h1 class="h1">Cadastro Alunos</h1>
            <div class="container">
                <div class="row">
                    <div class="col-5">
                        <form action="../usuario/acaousuario.php" method="post">
                            <input type="hidden" name="acao" value="salvar">
                            <input class="form-control" type="text" name="idusuario" id="idusuario" placeholder="ID" value="<?php if ($acao == 'editar') echo $dados['idusuario']; else echo '0'; ?>" readonly> <br>
            <input type="text" class="form-control" value="<?php if ($acao == 'editar') echo $dados['nome']?>" name="nome" id="nome" placeholder="Nome:" > <br>
            <input type="text" class="form-control" value="<?php if ($acao == 'editar') echo $dados['matricula']?>" name="matricula" id="matricula" placeholder="Matrícula:"> <br>
            <input type="date" class="form-control" value="<?php if ($acao == 'editar') echo $dados['nascimento']?>" name="nascimento" id="nascimento" placeholder="Data Nascimento:"> <br>
            <input type="text " class="form-control" value="<?php if ($acao == 'editar') echo $dados['sexo']?>" name="sexo" id="sexo" placeholder="Sexo:"> <br>
                    </div>

                    <div class="col-2">
                        <div class="imagem">
                            <img src="https://ifc.edu.br/wp-content/uploads/2022/12/Logo_IFC_vertical-1.png"
                                width="130px" alt="ifc" srcset="">
                            <br>
                        </div>
                    </div>

                    <div class="col-5">
                    <input type="text" class="form-control" value="<?php if ($acao == 'editar') echo $dados['turma']?>" name="turma" id="turma" placeholder="Turma:"> <br>
            <input type="password" class="form-control" value="<?php if ($acao == 'editar') echo ""; ?>" name="senha" id="senha" placeholder="Senha:"> <br>
<input type="password" class="form-control" value="<?php if ($acao == 'editar') echo ""; ?>" name="confirmarSenha" id="confirmarSenha" placeholder="Confirmar Senha:"> <br>
            <input name="alergias" class="form-control" value="<?php if ($acao == 'editar') echo $dados['alergias']?>" id="alergias" placeholder="Alergias:"> <br>
            <input name="cpf" class="form-control" value="<?php if ($acao == 'editar') echo $dados['cpf']?>" id="cpf" placeholder="CPF:"> <br>
                        <input class="btn btn-success"  type="submit" value="salvar" name="acao" id="acao">ﾠﾠﾠ
                        </form>
                        <!--BOTÃO DE CANCELAR-->
                        <button class="btn btn-outline-success"
                            onclick="window.location.href='../index.php'">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </center>
</body>

</html>
