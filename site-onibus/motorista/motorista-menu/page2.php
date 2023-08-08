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
 
        <h1 class="titulo-onibus" >Onibus cadastrados</h1>
        
<?php
require("conexao.php");


?>



<?php
require("conexao.php");

// Verifica se o usuário está logado (com o CPF)
if (isset($_SESSION['cpf'])) {
    $cpf = $_SESSION['cpf'];

    // Consulta os ônibus associados ao motorista com base no CPF
    $consulta_onibus = "SELECT onibus.chassi, onibus.modelo FROM onibus
                        INNER JOIN motoristas ON onibus.id_motorista = motoristas.id
                        WHERE motoristas.cpf = ?";
    $stmt_consulta_onibus = mysqli_prepare($conexao, $consulta_onibus);
    mysqli_stmt_bind_param($stmt_consulta_onibus, "s", $cpf);
    mysqli_stmt_execute($stmt_consulta_onibus);
    $resultado_onibus = mysqli_stmt_get_result($stmt_consulta_onibus);

    echo '<table class="tabela">';
    echo '<tr>';
    echo '<th class="onibus-th">Chassi</th>';
    echo '<th class="modelo-th">Modelo</th>';
    echo '<th class="td-vazio"></th>';
    echo '</tr>';

    while ($row = mysqli_fetch_assoc($resultado_onibus)) {
        echo '<tr>';
        echo '<td class="">' . $row['chassi'] . '</td>';
        echo '<td>' . $row['modelo'] . '</td>';
        echo '<td class="td-vazio"></td>';
        echo '</tr>';
    }

    echo '</table>';

    // Fechar o statement
    mysqli_stmt_close($stmt_consulta_onibus);
} else {
    // O usuário não está logado, exiba uma mensagem de erro
    echo "Usuário não logado. Faça o login para ver os ônibus associados.";
}

// Fechar a conexão
mysqli_close($conexao);
?>










      <?php
    // include("conexao.php");

    // $sql = "SELECT modelo, placa, chassi FROM onibus";
    // $resultado = mysqli_query($conexao, $sql);

    // if (mysqli_num_rows($resultado) > 0) {
    //     while ($row = mysqli_fetch_assoc($resultado)) {
    //         echo '<div class="item-onibus">';
    //         echo '<div class="foto">';
    //         echo '<img src="icone-do-onibus_609277-1523.avif" alt="">';
    //         echo '</div>';
    
    //         echo '<p class="item item-nome"> Nome:  '. $row['modelo'] . '</p>';
    //         echo '<p class="item item-modelo"> Modelo:  '. $row['modelo'] . '</p>';
    //         echo '<p class="item item-placa">Placa:  ' . $row['placa'] . '</p>';
    //         echo '<div class="btn-cx">';
    //         echo '<a href="detalhes_onibus.php?chassi=' . $row['chassi'] . '"><button class="item item-btn" value="detalhar"> Detalhar</button></a>';
    //         echo '</div>';
    //         echo '</div>';
    //     }
    // } else {
    //     echo "Nenhum ônibus cadastrado.</td></tr>";
    // }

    // mysqli_close($conexao);
    ?>
      


    


</body>
</html>


    

