<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do motorista</title>
</head>
<body>





<?php
    include("conexao.php");

    if (isset($_GET['cpf'])) {
        $cpf = $_GET['cpf'];

        // Faça a consulta ao banco de dados com base no chassi recebido e exiba os detalhes do ônibus
        $sql = "SELECT * FROM motorista WHERE cpf = ?";
        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, "s", $cpf);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($resultado) > 0) {
            $row = mysqli_fetch_assoc($resultado);
        
            echo '<p>Nome comleto: ' . $row['nome'] . '</p>';
            echo '<p>Apelido: ' . $row['apelido'] . '</p>';
            echo '<p>Cidade: ' . $row['cit'] . '</p>';
            echo '<p>forma de pagamento: ' . $row['meiopagamento'] . '</p>';
            echo '<p>forma de contato popular : ' . $row['formacontato'] . '</p>';
            echo '<p>onibus: ' . $row['onibus'] . '</p>';


            
            // ... outros detalhes do ônibus
        } else {
            echo "motorista não encontrado.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Cpf não informado.";
    }

    mysqli_close($conexao);
    ?>
    
</body>
</html>