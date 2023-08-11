<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-perfil.css">
    <title>perfil passageiro</title>
</head>
<body>
    
    
<div class="perfil">

<div class="foto">

<img src="4639606-perfil-foto-icone-ilustracao-isolado-no-fundo-branco-vetor.jpg" alt="">
</div>

<div class="form"> 



<?php
    // Inicialize a sessão para acessar os dados do usuário logado
    session_start();

    // Verifique se o usuário está logado
    if (isset($_SESSION['cpf']) && isset($_SESSION['senha'])) {
        $cpf = $_SESSION['cpf'];
        $senha = $_SESSION['senha'];

        $conexao = mysqli_connect("localhost", "root", "0512", "LOGINSITE");
        if (!$conexao) {
            die("Falha na conexão: " . mysqli_connect_error());
        }

        // Consulta SQL para buscar as informações do motorista
        $query = "SELECT nome, cit, meiopagamento, formacontato, onibus FROM motorista WHERE cpf = '$cpf' AND senha = '$senha'";
        $result = mysqli_query($conexao, $query);

        // Verifique se a consulta foi executada com sucesso
        if ($result) {
            // Verifique se encontrou algum motorista
            if (mysqli_num_rows($result) > 0) {
                $dadosMotorista = mysqli_fetch_assoc($result);

                echo '<div class="intem">';
                echo '<i class="fa-solid fa-user icone"></i>';
                echo '<h3 class="nome-padrao">Nome:</h3>';
                echo '<p class="nome-receber">' . $dadosMotorista['nome'] . '</p>';
                echo '</div>';

                echo '<div class="intem">';
                echo '<i class="fa-sharp fa-solid fa-location-dot icone"></i>';
                echo '<h3 class="nome-padrao">Cidade:</h3>';
                echo '<p class="nome-receber">' . $dadosMotorista['cit'] . '</p>';
                echo '</div>';

                echo '<div class="intem">';
                echo '<i class="fa-solid fa-city icone"></i>';
                echo '<h3 class="nome-padrao">Forma de pagamento:</h3>';
                echo '<p class="nome-receber">' . $dadosMotorista['meiopagamento'] . '</p>';
                echo '</div>';

                echo '<div class="intem">';
                echo '<i class="fa-sharp fa-solid fa-phone icone"></i>';
                echo '<h3 class="nome-padrao">Forma de Contato:</h3>';
                echo '<p class="nome-receber">' . $dadosMotorista['formacontato'] . '</p>';
                echo '</div>';

                echo '<div class="intem">';
                echo '<i class="fa-sharp fa-solid fa-bus icone"></i>';
                echo '<h3 class="nome-padrao">Ônibus:</h3>';
                echo '<p class="nome-receber">' . $dadosMotorista['onibus'] . '</p>';
                echo '</div>';
            } else {
                echo "CPF ou senha incorretos.";
            }

            // Libere o resultado da consulta
            mysqli_free_result($result);
        } else {
            echo "Erro na consulta: " . mysqli_error($conexao);
        }

        // Fechar a conexão com o banco de dados
        mysqli_close($conexao);
    } else {    
        //header("Location: login.php");
        //exit();
        echo "não está logado";
    }
?>









<!-- teste -->

  </div>
</div>    

</body>
</html>


    

