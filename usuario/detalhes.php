<?php 
    require_once "../conf/Conexao.php";
?> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <br>
    <center>
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-info-circle fa-fw"></i><b>Detalhes do Aluno</b></div>
            <div class="panel-body">
                <div class="container-fluid">
                    <div class="card" style="width: 18rem;">
                        <?php

                            $conexao = Conexao::getInstance();
                            $consulta=$conexao->query("SELECT * FROM usuario;");
                            
                            while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){
                                echo "<div class='card-body'>";
                                echo "<div class='card-header'><b>ID::</b> ".$linha["idusuario"]."</div>";
                                echo "<h5 class='card-title'><b>Nome:</b> ".$linha["nome"]."</h5>";
                                echo "<h5 class='card-title'><b>Turma:</b> ".$linha["turma"]."</h5>";
                                echo "<h5 class='card-title'><b>Matrícula:</b> ".$linha["matricula"]."</h5>";
                                echo "<h5 class='card-title'><b>Data Nasc. :</b> ".$linha["nascimento"]."</h5>";
                                echo "<h5 class='card-title'><b>Sexo:</b> ".$linha["sexo"]."</h5>";
                                echo "<h5 class='card-title'><b>CPF:</b> ".$linha["cpf"]."</h5>";
                                echo "<h5 class='card-title'><b>Alergias:</b> ".$linha["alergias"]."</h5>";
                                echo "<td><a class='btn btn-danger' onClick = 'return excluir();' href='acao.php?acao=excluir&idusuario={$linha['idusuario']}'>Excluir</a></td>
                                <a class='btn btn-primary' href='show.php'.>Voltar</a>
                                </tr>\n";
                            }
                        ?> 
                        
                    </div>
                </div>
            </div>
        </div>
    </center>