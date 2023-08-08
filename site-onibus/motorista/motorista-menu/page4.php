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




<p class="teste" >  </p>
<!-- <h3>primeiro lista comprovantes e um pequeno meniu que vai ter comprovantes e motorista, nos motoristas terao os comprovantes e os detalhes do  otorista tambe e a opçao de upar um comprovantes a masi     </h3> -->


<div class="conteudo-comprovante-1"></div>

      
      </div>


 <div class="conteudo-comprovante-2">
     

<form action="upload.php" method="post" enctype="multipart/form-data" >


<input type="file" name="arquivo">
<button type="subimt" > enviar </button>



</form>





<?php

session_start(); // Inicia a sessão

include("conexao.php");

// Verifica se o usuário está logado (com o CPF)
if (isset($_SESSION['cpf'])) {
    $cpf = $_SESSION['cpf'];

    // Consulta os comprovantes cadastrados para o CPF do usuário logado
    $sql = "SELECT nome, pafh, dataupload FROM pagamento WHERE cpf = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "s", $cpf);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Verifica se há comprovantes cadastrados
    if (mysqli_num_rows($result) > 0) {
        // Exibe os comprovantes em uma tabela
        echo '<table>';
        echo '<tr><th>Nome</th><th>Link</th><th>Data de Upload</th></tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['nome'] . '</td>';
            echo '<td><a href="' . $row['pafh'] . '" target="_blank">Ver Comprovante</a></td>';
            echo '<td>' . $row['dataupload'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "Nenhum comprovante cadastrado para este Usurio!";
    }

    mysqli_stmt_close($stmt);
} else {
    // O usuário não está logado, exiba uma mensagem de erro
    echo "Usuário não logado. Faça o login para visualizar os comprovantes.";
}
?>






  </div>












</body>
</html> 