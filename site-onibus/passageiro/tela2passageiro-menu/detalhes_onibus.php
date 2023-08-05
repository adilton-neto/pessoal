<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-detalhar.css">
    <title>Detalhes do Ônibus</title>
</head>
<body>

<div class="box">
        <div class="heater">
             <h1 class="ttk"> BUS NLT</h1>
             <div class="cximg">
            <img class="imagem" src="banner-lateral-campus-urucuca.png" alt="">
        </div>
        </div> 
         <div class="titulo">
            <h1 class="tt1">Detalhes do Ônibus</h1>
           
         </div>

    

    <?php
    // include("conexao.php");

    // if (isset($_GET['chassi'])) {
    //     $chassi = $_GET['chassi'];

    //     // Faça a consulta ao banco de dados com base no chassi recebido e exiba os detalhes do ônibus
    //     $sql = "SELECT * FROM onibus WHERE chassi = ?";
    //     $stmt = mysqli_prepare($conexao, $sql);
    //     mysqli_stmt_bind_param($stmt, "s", $chassi);
    //     mysqli_stmt_execute($stmt);
    //     $resultado = mysqli_stmt_get_result($stmt);

    //     if (mysqli_num_rows($resultado) > 0) {
    //         $row = mysqli_fetch_assoc($resultado);
        
    //         echo '<p>Modelo: ' . $row['modelo'] . '</p>';
    //         echo '<p>Placa: ' . $row['placa'] . '</p>';
    //         echo '<p>Assentos: ' . $row['assentos'] . '</p>';
    //         echo '<p>Cor: ' . $row['cor'] . '</p>';


            
    //         // ... outros detalhes do ônibus
    //     } else {
    //         echo "Ônibus não encontrado.";
    //     }

    //     mysqli_stmt_close($stmt);
    // } else {
    //     echo "Chassi não informado.";
    // }

    // mysqli_close($conexao);
    ?>



<!-- //////////////////// tesete ////////////// -->

<?php
include("conexao.php");

if (isset($_GET['chassi'])) {
    $chassi = $_GET['chassi'];

    // Faça a consulta ao banco de dados com base no chassi recebido e exiba os detalhes do ônibus
    $consulta_onibus = "SELECT * FROM onibus WHERE chassi = ?";
    $stmt_consulta_onibus = mysqli_prepare($conexao, $consulta_onibus);
    mysqli_stmt_bind_param($stmt_consulta_onibus, "s", $chassi);
    mysqli_stmt_execute($stmt_consulta_onibus);
    $resultado_onibus = mysqli_stmt_get_result($stmt_consulta_onibus);

    if (mysqli_num_rows($resultado_onibus) > 0) {
        $row_onibus = mysqli_fetch_assoc($resultado_onibus);

        echo '<p>Modelo: ' . $row_onibus['modelo'] . '</p>';
        echo '<p>Placa: ' . $row_onibus['placa'] . '</p>';
        echo '<p>Assentos: ' . $row_onibus['assentos'] . '</p>';
        echo '<p>Cor: ' . $row_onibus['cor'] . '</p>';

       echo' <div class="titulo-2">';
        echo '<h1 class="ttk-rotas" >Rotas </h1>';
       echo' </div>';
        // Consulta os dados na tabela "pontosdeparada" com base no chassi recebido
        $consulta_dados = "SELECT horario, nome FROM pontosdeparada WHERE chassi = ?";
        $stmt_consulta_dados = mysqli_prepare($conexao, $consulta_dados);
        mysqli_stmt_bind_param($stmt_consulta_dados, "s", $chassi);
        mysqli_stmt_execute($stmt_consulta_dados);
        $resultado_dados = mysqli_stmt_get_result($stmt_consulta_dados);

        if (mysqli_num_rows($resultado_dados) > 0) {
            // Exibe os dados em uma tabela
            echo '<table class="tabela">';
            echo '<tr><th class="horario-th">Horário</th><th class="rota-th">Ponto de Parada</th></tr>';
            while ($row_dados = mysqli_fetch_assoc($resultado_dados)) {
                echo '<tr>';
                echo '<td>' . $row_dados['horario'] . '</td>';
                echo '<td>' . $row_dados['nome'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo "Nenhum dado encontrado para o chassi informado.";
        }

        // Fechar o statement de consulta dos dados
        mysqli_stmt_close($stmt_consulta_dados);
    } else {
        echo "Ônibus não encontrado.";
    }

    // Fechar o statement de consulta do ônibus
    mysqli_stmt_close($stmt_consulta_onibus);
} else {
    echo "Chassi não informado.";
}

mysqli_close($conexao);
?>



<style>


table {
    border-collapse: collapse;
    width: 45%;
margin-left:17vh;
   

}

th, td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
   

}

td{

 
   
}

th {
    background-color: #f2f2f2;
   
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}



.horario-th{
    width:30%;


}

.rota-th{
    width:70%;
    
}





</style>




</body>
</html>
