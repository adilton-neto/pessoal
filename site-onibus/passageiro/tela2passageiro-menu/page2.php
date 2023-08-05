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
                // include("conexao.php");

                // $sql = "SELECT modelo, placa FROM onibus";
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
                //         echo'<div class="btn-cx">';
                //         echo '<button class="item item-btn" value="detalhar"> Detalhar</button>';
                //         echo '</div>';
                //         echo '</div>';
                //     }
                // } else {
                //     echo "colspan='2'>Nenhum ônibus cadastrado.</td></tr>";
                // }

                // mysqli_close($conexao);
                ?>
      

      <?php
    include("conexao.php");

    $sql = "SELECT modelo, placa, chassi FROM onibus";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        while ($row = mysqli_fetch_assoc($resultado)) {
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
        echo "Nenhum ônibus cadastrado.</td></tr>";
    }

    mysqli_close($conexao);
    ?>
      


    


</body>
</html>


    

