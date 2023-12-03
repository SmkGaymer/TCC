<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  body {
    background-color: #f0f0f0;
  }

  .navbar {
    background-color: #177C33;
  }

  .navbar-brand,
  .nav-link {
    color: #fff;
  }
 
  .navbar-brand:hover,
  .nav-link:hover {
    color: #fff;
  }

  .navbar-logo {
    width: 40px;
    height: auto;
    margin-right: 10px;
  }
</style>
<title>Cardápio</title>
<link rel="shortcut icon" href="../img/favicon.ico"/>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="../img/logosfundo.png" alt="Logo" class="navbar-logo">
        Cardápio - Instituto Federal
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="../alimentos/show.php">Alimentos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../cardapio/show.php">Dias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../usuario/show.php">Usuario</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../cardapio_alimento/cad.php">Cadastrar Cardápio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../cardapio_alimento/show.php">Cardápio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../cozinha/show.php">Cozinheiros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../cozinha/avaliacoes.php">Avaliações</a>
          </li
          
        </ul>
      </div>
    </div>
  </nav>

</body>
</html>