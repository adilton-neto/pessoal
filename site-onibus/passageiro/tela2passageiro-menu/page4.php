<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprovante</title>
</head>
<body>

<style>
.teste{
margin-top:15vh;

}

</style>




<p class="teste" >se</p>
<!-- <h3>primeiro lista comprovantes e um pequeno meniu que vai ter comprovantes e motorista, nos motoristas terao os comprovantes e os detalhes do  otorista tambe e a opçao de upar um comprovantes a masi     </h3> -->


<div class="conteudo-comprovante-1"></div>

<?php
    // include("conexao.php");

    // $sql = "SELECT id, documento FROM pagamento";
    // $resultado = mysqli_query($conexao, $sql);

    // if (mysqli_num_rows($resultado) > 0) {
    //     while ($row = mysqli_fetch_assoc($resultado)) {
         
    
    //         echo '<p class="item item-nome"> Nome:  '. $row['id'] . '</p>';
    //         echo '<p class="item item-modelo"> onibus:  '. $row['documento'] . '</p>';
           

    //     echo '<a href="detalhes_pagamento.php?id=' . $row['id'] . '"><button class="item item-btn" value="detalhar"> Detalhar  </button></a>';
          
    //     }
    // } else {
    //     echo "Nenhum comprovantes encontrado.";
    // }

    // mysqli_close($conexao);
    ?>
      
      </div>


 <div class="conteudo-comprovante-2">
     

<form action="upload.php" method="post" enctype="multipart/form-data" >


<input type="file" name="arquivo">
<button type="subimt" > enviar </button>



</form>





  </div>























<!-- 
      include("conexao.php");

$sql = "SELECT apelido, onibus, formacontato, cpf FROM motorista";
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0) {
    while ($row = mysqli_fetch_assoc($resultado)) {
     

        echo '<p class="item item-nome"> Nome:  '. $row['apelido'] . '</p>';
        echo '<p class="item item-modelo"> onibus:  '. $row['onibus'] . '</p>';
        echo '<p class="item item-placa">forma de contato popular:  ' . $row['formacontato'] . '</p>';
        echo '<div class="btn-cx">';

    echo '<a href="detalhes_motorista.php?cpf=' . $row['cpf'] . '"><button class="item item-btn" value="detalhar"> Detalhar  </button></a>';
      
    }
} else {
    echo "Nenhum Motorista cadastrado.</td></tr>";
}

mysqli_close($conexao);
?> -->
</body>
</html> 