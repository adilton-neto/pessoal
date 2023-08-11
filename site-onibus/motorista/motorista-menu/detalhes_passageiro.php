
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-detalhe-passageiro.css">
    <title>Compronvante passageiro</title>
</head>
<body>


<div class="heater">
          <div class="barra-menu">
       
          </div>
          <div class="nome">
          <h1 class="ttk"> BUS NLT</h1>
         </div>
              <div class="cximg">
                  <img class="imagem" src="banner-lateral-campus-urucuca.png" alt="">
             </div>


     </div>







    


<?php

require("conexao.php");

// Verifica se o CPF foi passado como parâmetro na URL
if (isset($_GET['cpf'])) {
    $cpf = $_GET['cpf'];

    // Consulta os comprovantes relacionados ao CPF
    $sql = "SELECT nome, pafh, dataupload FROM pagamento WHERE cpf = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "s", $cpf);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Verifica se há comprovantes cadastrados
    if (mysqli_num_rows($result) > 0) {
        // Exibe os comprovantes
echo' <div class="box">';   
        echo '<table  class="tabela">';
        echo '<tr><th class="th-nome" >Nome</th><th>Link</th><th>Data de Upload</th></tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr class="item-maior">';
            echo '<td class="item-comprovante nome">' . $row['nome'] . '</td>';
            //echo '<td class="item-comprovante" ><a href="' . $row['pafh'] . '" target="_blank">Ver Comprovante</a></td>'; 
            echo '<td class="item-comprovante" ><a href="ver-comprovante.php?pafh=' . $row['pafh'] . '" target="_blank">Ver Comprovante</a></td>';
     
            echo '<td <td class="item-comprovante" >' . $row['dataupload'] . '</td>';
            echo '</tr>';
        
        }

        echo '</table>';
    } else {
        echo "Nenhum comprovante cadastrado para este usuário.";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "CPF não fornecido.";
}

mysqli_close($conexao);

?>

<div class="btn-concluido-cixa">
<a href="http://localhost//site-onibus/motorista/motorista-menu/index.html#5"><button class="btn-concluido" type="button">voltar </button></a>
</div>

 








</div> <!--  box     -->
</body>
</html>
