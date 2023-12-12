<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações de Alimentação</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <?php
    include "../header.php";
    require_once "../cardapio_alimento/contagem.php";
    ?>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .center-screen {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .info-container {
            width: 80%;
            padding: 20px;
            border: 5px solid #4CAF50;
            border-radius: 10px;
            background-color: #fff;
        }
        .info-title {
            font-size: 24px;
            font-weight: bold;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .info-table th, .info-table td {
            padding: 10px;
            text-align: center;
            font-size: 20px;
            border: 1px solid #ccc;
        }
        .total-title {
            font-size: 36px;
            font-weight: bold;
            margin-top: 20px;
            color: #4CAF50;
        }
        .rating-stars {
            color: #ffcc00;
        }
    </style>
</head>
<body>
    <div class="center-screen">
        <div class="info-container">
            <h1 class="text-center">Quantidade de Alunos</h1>
            
            <table class="info-table">
                <tr>
                    <th class="info-title">Tipo</th>
                    <th class="info-title">Quantidade</th>
    
                </tr>
                <tr>
                    <td>Sem intolerância</td>
                    <td><?php echo $contagemAtual; ?></td>
                 
                </tr>
            </table>
            
            <div class="text-center mt-4">
                <p class="total-title">Total de Alunos: <br> <?php echo $contagemAtual; ?> </p>
            </div>
            
                    
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>
