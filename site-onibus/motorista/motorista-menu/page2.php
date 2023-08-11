<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-onibus.css">
    <title>Document</title>
</head>
<body>
    
<div class="box">
 
        <h1 class="titulo-onibus" >Meus Onibus!</h1>
        
<?php
require("conexao.php");


?>


<!--////////////////////////////////////////// correcao //////////////////////////////////////////// -->


<?php
// Inicie a sessão
session_start();

require("conexao.php");

// Verifica se o usuário está logado (com o CPF)
if (isset($_SESSION['cpf'])) {
    $cpf = $_SESSION['cpf'];

    // Consulta os ônibus associados ao motorista com base no CPF
    $consulta_onibus = "SELECT chassi, modelo, placa FROM onibus WHERE cpf = ?";
    $stmt_consulta_onibus = mysqli_prepare($conexao, $consulta_onibus);

    // Verifica se a preparação do statement foi bem-sucedida
    if ($stmt_consulta_onibus) {
        mysqli_stmt_bind_param($stmt_consulta_onibus, "s", $cpf);
        mysqli_stmt_execute($stmt_consulta_onibus);

        // Verifica se a execução do statement foi bem-sucedida
        if (mysqli_stmt_execute($stmt_consulta_onibus)) {
            $resultado_onibus = mysqli_stmt_get_result($stmt_consulta_onibus);

            

            while ($row = mysqli_fetch_assoc($resultado_onibus)) {
                echo '<div class="item-onibus">';
                echo '<div class="foto">';
                echo '<img src="icone-do-onibus_609277-1523.avif" alt="">';
                echo '</div>';
        
                echo '<p class="item item-nome"> Nome:  '. $row['modelo'] . '</p>';
                echo '<p class="item item-modelo"> Modelo:  '. $row['modelo'] . '</p>';
                echo '<p class="item item-placa">Placa:  ' . $row['placa'] . '</p>';
                echo '<div class="btn-cx">';
                echo '<a href="detalhes_onibus.php?chassi=' . $row['chassi'] . '"><button class="item item-btn" value="detalhar"> Detalhar</button></a>';
                echo '</div>';
                echo '</div>';


            }

           
        } else {
            echo "Erro ao executar a consulta: " . mysqli_error($conexao);
        }

        // Fechar o statement
        mysqli_stmt_close($stmt_consulta_onibus);
    } else {
        echo "Erro ao preparar a consulta: " . mysqli_error($conexao);
    }

    // Fechar a conexão
    mysqli_close($conexao);
} else {
    // O usuário não está logado, exiba uma mensagem de erro
    echo "Usuário não logado. Faça o login para ver os ônibus associados.";
}
?>

</div>




      


    


</body>
</html>


    

