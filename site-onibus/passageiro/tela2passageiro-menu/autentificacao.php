<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    




<!--seguindo este codigo crie outra pagina que mostre as informaçoes nome, pontoparada, cidademomento, formacontato, onibus, do usuario cadastrado de acordo com o login, mas o redirecionamento apos o login continue o mesmo, quero uma pagina onde me mostre estas informaçoes caso eu abra esta pagina determinada -->

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

        // Consulta SQL para buscar o usuário no banco de dados usando o CPF
        $query = "SELECT * FROM passageiro WHERE cpf = '$cpf' AND senha = '$senha'";
        $result = mysqli_query($conexao, $query);

        // Verifica se encontrou algum usuário
        if (mysqli_num_rows($result) > 0) {
            // Login bem-sucedido, você pode redirecionar o usuário para a página inicial ou outra página restrita

            ob_clean();
            header("Location: http://localhost/site-onibus/tela2passageiro-menu/index.html");
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