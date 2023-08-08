<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php

// require("conexao.php");

// // Verifica se o formulário foi enviado
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Recupera os dados do formulário
//     $cpf = $_POST['cpf'];
//     $senha = $_POST['senha'];

//     // Verifica se os campos de CPF e senha estão preenchidos
//     if (!empty($cpf) && !empty($senha)) {
//         // Realiza a validação no banco de dados
//         $conexao = mysqli_connect("localhost", "root", "0512", "LOGINSITE");
//         if (!$conexao) {
//             die("Falha na conexão: " . mysqli_connect_error());
//         }

//         // Consulta SQL para buscar o usuário no banco de dados usando o CPF
//         $query = "SELECT * FROM passageiro WHERE cpf = '$cpf' AND senha = '$senha'";
//         $result = mysqli_query($conexao, $query);

//         // Verifica se encontrou algum usuário
//         if (mysqli_num_rows($result) > 0) {
//             // Login bem-sucedido, você pode redirecionar o usuário para a página do perfil
//             session_start();
//             $_SESSION['cpf'] = $cpf;
//             $_SESSION['senha'] = $senha;
//             header("Location: ../site-onibus/passageiro/tela2passageiro-menu/index.html");
//             exit();

//         } else {
//             // Credenciais inválidas, exibir uma mensagem de erro
//             echo "CPF ou senha incorretos.";
//         }

//         mysqli_close($conexao);
//     } else {
//         // Campos vazios, exibir uma mensagem de erro
//         echo "Por favor, preencha todos os campos.";
//     }
// }
?>


<!-- teste de requirimento segundo a funcao -->


<?php


require("conexao.php");

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os dados do formulário
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    // Verifica se os campos de CPF e senha estão preenchidos
    if (!empty($cpf) && !empty($senha)) {
        // Realiza a validação no banco de dados
        $conexao = mysqli_connect("localhost", "root", "0512", "LOGINSITE");
        if (!$conexao) {
            die("Falha na conexão: " . mysqli_connect_error());
        }

        // Consulta SQL para buscar o usuário na tabela de passageiros
        $query_passageiro = "SELECT * FROM passageiro WHERE cpf = '$cpf' AND senha = '$senha'";
        $result_passageiro = mysqli_query($conexao, $query_passageiro);

        // Consulta SQL para buscar o usuário na tabela de motoristas
        $query_motorista = "SELECT * FROM motorista WHERE cpf = '$cpf' AND senha = '$senha'";
        $result_motorista = mysqli_query($conexao, $query_motorista);

        // Verifica se encontrou algum usuário como passageiro
        if (mysqli_num_rows($result_passageiro) > 0) {
            // Login bem-sucedido para passageiro, redireciona para a página do menu do passageiro
            session_start();
            $_SESSION['cpf'] = $cpf;
            $_SESSION['senha'] = $senha;
            header("Location: ../site-onibus/passageiro/tela2passageiro-menu/index.html");
            exit();
        }
        // Verifica se encontrou algum usuário como motorista
        elseif (mysqli_num_rows($result_motorista) > 0) {
            // Login bem-sucedido para motorista, redireciona para a página do menu do motorista
            session_start();
            $_SESSION['cpf'] = $cpf;
            $_SESSION['senha'] = $senha;
            header("Location: ../site-onibus/motorista/motorista-menu/index.html");
            exit();
        } else {
            // Credenciais inválidas, exibir uma mensagem de erro
            echo "CPF ou senha incorretos.";
        }

        mysqli_close($conexao);
    } else {
        // Campos vazios, exibir uma mensagem de erro
        echo "Por favor, preencha todos os campos.";
    }
}
?>











    
</body>
</html>