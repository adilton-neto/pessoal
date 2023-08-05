<?php

 //include("conexao.php"); 



  //$nome  = $_POST ['nome'];
  //$pontoparada  = $_POST ['pontoparada'];
  //$cidademomento  = $_POST ['cidademomento'];
  //$formacontato  = $_POST ['formacontato'];
  //$onibus  = $_POST ['onibus'];

  //$sql = "INSERT INTO passageiro (nome,pontoparada,cidademomento,formacontato,onibus) VALUES ('$nome','$pontoparada','$cidademomento','$formacontato','$onibus')";


  //if(mysqli_query($conexao, $sql)){
     
    //echo "Usauario cadastrado com sucesso!!";
//header("location: tela2passageiro-menu/menu.html ");
//exit();
  //}
  //else{
    //echo "Erro".mysqli_connect_error($conexao);
  //}

  //mysqli_close($conexao);




?>




<?php
// Incluir o arquivo de conexão (conexao.php)
require("conexao.php");

// Obter os dados do formulário e aplicar validação/sanitização
$cpf = $_POST['cpf'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];
$pontoparada = $_POST['pontoparada'];
$cidademomento = $_POST['cidademomento'];
$formacontato = $_POST['formacontato'];
$onibus = $_POST['onibus'];

// Verificar se o registro já existe no banco de dados com base no CPF
$consulta_cpf = "SELECT * FROM passageiro WHERE cpf = ?";
$stmt_consulta = mysqli_prepare($conexao, $consulta_cpf);
mysqli_stmt_bind_param($stmt_consulta, "s", $cpf);
mysqli_stmt_execute($stmt_consulta);
$resultado = mysqli_stmt_get_result($stmt_consulta);

if (mysqli_num_rows($resultado) > 0) {
    // O registro já existe, mas não é permitido modificar o CPF ou senha
    $atualizar_dados = "UPDATE passageiro SET nome = ?, pontoparada = ?, cidademomento = ?, formacontato = ?, onibus = ? WHERE cpf = ?";
    $stmt_atualizar = mysqli_prepare($conexao, $atualizar_dados);
    mysqli_stmt_bind_param($stmt_atualizar, "ssssss", $nome, $pontoparada, $cidademomento, $formacontato, $onibus, $cpf);

    if (mysqli_stmt_execute($stmt_atualizar)) {
        // Usuário atualizado com sucesso! Redirecionar para a página de menu
        mysqli_stmt_close($stmt_atualizar);
        mysqli_stmt_close($stmt_consulta);
        mysqli_close($conexao);
        header("Location: http://localhost/site-onibus/tela2passageiro-menu/index.html");
        exit();
    } else {
        echo "Erro ao atualizar o usuário: " . mysqli_stmt_error($stmt_atualizar);
    }

    // Fechar o statement de atualização
    mysqli_stmt_close($stmt_atualizar);
} else {
    // O registro não existe, emitir mensagem de erro
    echo "Cadastro inexistente, impossível criar perfil!";
}

// Fechar o statement de consulta
mysqli_stmt_close($stmt_consulta);

// Fechar a conexão
mysqli_close($conexao);
?>
