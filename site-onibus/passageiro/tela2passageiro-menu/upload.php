

<?php

session_start(); // Inicia a sessão

include("conexao.php");

var_dump($_FILES);

if (isset($_SESSION['cpf'])) {
    // O usuário está logado (com o CPF), então podemos prosseguir com o cadastro

    if (isset($_FILES['arquivo'])) {
        $arquivo = $_FILES['arquivo'];

        if ($arquivo['error']) {
            die("Falha ao enviar arquivo");
        }

        if ($arquivo['size'] > 8589934592) {
            die("Arquivo muito grande! Max: 8MB");
        }

        echo "Arquivo enviado";

        $pasta = "arquivos-comprovantes/";
        $nomeDoArquivo = $arquivo['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

        if ($extensao != "jpg" && $extensao != 'png' && $extensao != 'pdf') {
            die("Tipo de arquivo inválido, apenas arquivos jpg, png e pdf são permitidos!");
        }

        $pafh = $pasta . $novoNomeDoArquivo . "." . $extensao;
        $deu_certo = move_uploaded_file($arquivo["tmp_name"], $pafh);

        if ($deu_certo) {
            $cpf = $_SESSION['cpf'];

            // Inserimos o registro na tabela "pagamento" usando o CPF como identificador
            $sql_pagamento = "INSERT INTO pagamento (nome, pafh, dataupload, cpf) VALUES (?, ?, NOW(), ?)";
            $stmt_pagamento = mysqli_prepare($conexao, $sql_pagamento);
            mysqli_stmt_bind_param($stmt_pagamento, "sss", $nomeDoArquivo, $pafh, $cpf);

            if (mysqli_stmt_execute($stmt_pagamento)) {
                echo "<p>Arquivo enviado e registrado com sucesso!</p>";
            } else {
                echo "Erro ao registrar o arquivo: " . mysqli_error($conexao);
            }

            mysqli_stmt_close($stmt_pagamento);
        } else {
            echo "Falha ao enviar arquivo";
        }
    }
} else {
    // O usuário não está logado, exiba uma mensagem de erro
    echo "Usuário não logado. Faça o login para enviar o documento.";
}
?>



