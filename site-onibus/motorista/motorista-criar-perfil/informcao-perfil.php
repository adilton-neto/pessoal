<?php

require("conexao.php");


$cpf = $_POST['cpf'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];
$apelido = $_POST['apelido'];
$meiopagamento = $_POST['meiopagamento'];
$formacontato = $_POST['formacontato'];
$onibus = $_POST['onibus'];

// Verificar se o registro já existe no banco de dados com base no CPF
$consulta_cpf = "SELECT * FROM motorista WHERE cpf = ?";
$stmt_consulta = mysqli_prepare($conexao, $consulta_cpf);
mysqli_stmt_bind_param($stmt_consulta, "s", $cpf);
mysqli_stmt_execute($stmt_consulta);
$resultado = mysqli_stmt_get_result($stmt_consulta);

if (mysqli_num_rows($resultado) > 0) {
   
  // O registro ja existe, mas n é permitido modificar o CPF ou senha
  
    $atualizar_dados = "UPDATE  motorista SET nome = ?, apelido = ?, meiopagamento = ?, formacontato = ?, onibus = ? WHERE cpf = ?";
    $stmt_atualizar = mysqli_prepare($conexao, $atualizar_dados);
    mysqli_stmt_bind_param($stmt_atualizar, "ssssss", $nome, $apelido, $meiopagamento, $formacontato, $onibus, $cpf);

    if (mysqli_stmt_execute($stmt_atualizar)) {
        // Usuario atualizado, Redirecionar para a pagina de menu
        mysqli_stmt_close($stmt_atualizar);
        mysqli_stmt_close($stmt_consulta);
        mysqli_close($conexao);
        header("Location: ../motorista-cadastrar-onibus/index.html");
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
