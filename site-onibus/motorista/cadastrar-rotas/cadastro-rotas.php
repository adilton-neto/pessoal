<?php

require("conexao.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os dados do formulário
    $horario = $_POST['horario'];
    $nome = $_POST['nome'];
    $chassi = $_POST['chassi'];

    // Verificar se o chassi existe na tabela "onibus"
    $consulta_chassi = "SELECT * FROM onibus WHERE chassi = ?";
    $stmt_consulta_chassi = mysqli_prepare($conexao, $consulta_chassi);
    mysqli_stmt_bind_param($stmt_consulta_chassi, "s", $chassi);
    mysqli_stmt_execute($stmt_consulta_chassi);
    $resultado_chassi = mysqli_stmt_get_result($stmt_consulta_chassi);

    if (mysqli_num_rows($resultado_chassi) === 0) {
        // O chassi não existe na tabela "onibus", emitir mensagem de erro
        echo "Chassi não encontrado na tabela de ônibus. Verifique o chassi e tente novamente.";
        mysqli_stmt_close($stmt_consulta_chassi);
        mysqli_close($conexao);
        exit();
    }

    // Verificar se já existe um registro com o mesmo nome e chassi na tabela "pontosdeparada"
    $consulta_duplicatas = "SELECT * FROM pontosdeparada WHERE nome = ? AND chassi = ?";
    $stmt_consulta_duplicatas = mysqli_prepare($conexao, $consulta_duplicatas);
    mysqli_stmt_bind_param($stmt_consulta_duplicatas, "ss", $nome, $chassi);
    mysqli_stmt_execute($stmt_consulta_duplicatas);
    $resultado_duplicatas = mysqli_stmt_get_result($stmt_consulta_duplicatas);

    if (mysqli_num_rows($resultado_duplicatas) > 0) {
        // Já existe um registro com o mesmo nome e chassi, emitir mensagem de erro
        echo "Já existe um registro com o mesmo nome e chassi na tabela.";
        mysqli_stmt_close($stmt_consulta_duplicatas);
        mysqli_close($conexao);
        exit();
    }

    // Verificar se o registro já existe na tabela "pontosdeparada" com base no nome
    $consulta_nome = "SELECT * FROM pontosdeparada WHERE nome = ?";
    $stmt_consulta_nome = mysqli_prepare($conexao, $consulta_nome);
    mysqli_stmt_bind_param($stmt_consulta_nome, "s", $nome);
    mysqli_stmt_execute($stmt_consulta_nome);
    $resultado_nome = mysqli_stmt_get_result($stmt_consulta_nome);

    if (mysqli_num_rows($resultado_nome) > 0) {
        // O registro já existe, atualizar os campos horario e chassi

        $atualizar_dados = "UPDATE pontosdeparada SET horario = ?, chassi = ? WHERE nome = ?";
        $stmt_atualizar = mysqli_prepare($conexao, $atualizar_dados);
        mysqli_stmt_bind_param($stmt_atualizar, "sss", $horario, $chassi, $nome);

        if (mysqli_stmt_execute($stmt_inserir)) {
            // Dados inseridos com sucesso, redirecionar para a página de menu
            mysqli_stmt_close($stmt_inserir);
            mysqli_stmt_close($stmt_consulta_nome);
            mysqli_close($conexao);
            header("Location: index.php"); // Redireciona para index.php
            exit();
        } else {
            echo "Erro ao inserir os dados: " . mysqli_stmt_error($stmt_inserir);
        }
        

        // Fechar o statement de atualização
        mysqli_stmt_close($stmt_atualizar);
    } else {
        // O registro não existe, realizar a inserção
        $inserir_dados = "INSERT INTO pontosdeparada (horario, nome, chassi) VALUES (?, ?, ?)";
        $stmt_inserir = mysqli_prepare($conexao, $inserir_dados);
        mysqli_stmt_bind_param($stmt_inserir, "sss", $horario, $nome, $chassi);

        if (mysqli_stmt_execute($stmt_inserir)) {
            // Dados inseridos com sucesso, redirecionar para a página de menu
            mysqli_stmt_close($stmt_inserir);
            mysqli_stmt_close($stmt_consulta_nome);
            mysqli_close($conexao);
            header("Location: index.php");
            exit();
        } else {
            echo "Erro ao inserir os dados: " . mysqli_stmt_error($stmt_inserir);
        }

        // Fechar o statement de inserção
        mysqli_stmt_close($stmt_inserir);
    }

    // Fechar os statements de consulta
    mysqli_stmt_close($stmt_consulta_nome);
    mysqli_stmt_close($stmt_consulta_duplicatas);
    mysqli_stmt_close($stmt_consulta_chassi);
}
?>






