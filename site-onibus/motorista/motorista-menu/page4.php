<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-comprovante.css">
    <title>Comprovante</title>
</head>
<body>

<style>
.teste{
margin-top:15vh;

}




</style>



<p class="teste" >  </p>



<?php

require("conexao.php");

// Consulta os dados dos passageiros cadastrados
$consulta_passageiros = "SELECT nome, cpf, onibus FROM passageiro";
$resultado_passageiros = mysqli_query($conexao, $consulta_passageiros);

if (mysqli_num_rows($resultado_passageiros) > 0) {
    while ($row = mysqli_fetch_assoc($resultado_passageiros)) {
        
        echo '<div ="coteudo-comprovante-1">';
        echo '<p class="item coteudo-comprovante">Nome: ' . $row['nome'] . '</p>';
        echo '<p class="item coteudo-comprovante">CPF: ' . $row['cpf'] . '</p>';
        echo '<p class="item coteudo-comprovante">Ônibus: ' . $row['onibus'] . '</p>';
        echo '<a href="detalhes_passageiro.php?cpf=' . $row['cpf'] . '">Detalhar</a>';
        echo '</div>';
    }
} else {
    echo "Nenhum passageiro cadastrado.";
}

mysqli_close($conexao);

?>




  </div>












</body>
</html> 