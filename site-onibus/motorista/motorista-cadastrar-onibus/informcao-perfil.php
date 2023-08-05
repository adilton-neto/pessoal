<?php

// require("conexao.php");

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Recupera os dados do formulário
//     $cpf = $_POST['cpf'];
//     $chassi = $_POST['chassi'];
//     $placa = $_POST['placa'];
//     $cor = $_POST['cor'];
//     $assentos = $_POST['assentos'];
//     $pontosparada = $_POST['pontosparada'];
//     $modelo = $_POST['modelo'];

//     // Verificar se o registro já existe no banco de dados com base no CPF
//     $consulta_cpf = "SELECT * FROM onibus WHERE cpf = ?";
//     $stmt_consulta = mysqli_prepare($conexao, $consulta_cpf);
//     if ($stmt_consulta) {
//         mysqli_stmt_bind_param($stmt_consulta, "s", $cpf);
//         mysqli_stmt_execute($stmt_consulta);
//         $resultado = mysqli_stmt_get_result($stmt_consulta);

//         if (mysqli_num_rows($resultado) > 0) {
//             // O registro já existe, mas não é permitido modificar o CPF ou senha

//             $atualizar_dados = "UPDATE onibus SET chassi = ?, placa = ?, cor = ?, assentos = ?, pontosparada = ?, modelo = ? WHERE cpf = ?";
//             $stmt_atualizar = mysqli_prepare($conexao, $atualizar_dados);
//             if ($stmt_atualizar) {
//                 mysqli_stmt_bind_param($stmt_atualizar, "sssssss", $chassi, $placa, $cor, $assentos, $pontosparada, $modelo, $cpf);

//                 if (mysqli_stmt_execute($stmt_atualizar)) {
//                     // Usuário atualizado, Redirecionar para a página de menu
//                     mysqli_stmt_close($stmt_atualizar);
//                     mysqli_stmt_close($stmt_consulta);
//                     mysqli_close($conexao);
//                     header("Location: http://localhost/site-onibus/login.html");
//                     exit();
//                 } else {
//                     echo "Erro ao atualizar o usuário: " . mysqli_stmt_error($stmt_atualizar);
//                 }
//             } else {
//                 echo "Erro ao preparar a declaração de atualização: " . mysqli_error($conexao);
//             }

//             // Fechar o statement de atualização
//             mysqli_stmt_close($stmt_atualizar);
//         } else {
//             // O registro não existe, realizar a inserção
//             $inserir_dados = "INSERT INTO onibus (cpf, chassi, placa, cor, assentos, pontosparada, modelo) VALUES (?, ?, ?, ?, ?, ?, ?)";
//             $stmt_inserir = mysqli_prepare($conexao, $inserir_dados);
//             if ($stmt_inserir) {
//                 mysqli_stmt_bind_param($stmt_inserir, "sssssss", $cpf, $chassi, $placa, $cor, $assentos, $pontosparada, $modelo);

//                 if (mysqli_stmt_execute($stmt_inserir)) {
//                     // Usuário inserido, Redirecionar para a página de menu
//                     mysqli_stmt_close($stmt_inserir);
//                     mysqli_stmt_close($stmt_consulta);
//                     mysqli_close($conexao);
//                     header("Location: http://localhost/site-onibus/login.html");
//                     exit();
//                 } else {
//                     echo "Erro ao inserir o usuário: " . mysqli_stmt_error($stmt_inserir);
//                 }
//             } else {
//                 echo "Erro ao preparar a declaração de inserção: " . mysqli_error($conexao);
//             }

//             // Fechar o statement de inserção
//             mysqli_stmt_close($stmt_inserir);
//         }

//         // Fechar o statement de consulta
//         mysqli_stmt_close($stmt_consulta);
//     } else {
//         echo "Erro ao preparar a declaração de consulta: " . mysqli_error($conexao);
//     }
// }
?>


<?php

require("conexao.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os dados do formulário
    $cpf = $_POST['cpf'];
    $chassi = $_POST['chassi'];
    $placa = $_POST['placa'];
    $cor = $_POST['cor'];
    $assentos = $_POST['assentos'];
    $pontosparada = isset($_POST['pontosparada']) ? $_POST['pontosparada'] : ""; // Definir como uma string vazia se não houver seleções
    $modelo = $_POST['modelo'];

    // Verificar se o registro já existe no banco de dados com base no CPF
    $consulta_cpf = "SELECT * FROM onibus WHERE cpf = ?";
    $stmt_consulta = mysqli_prepare($conexao, $consulta_cpf);
    if ($stmt_consulta) {
        mysqli_stmt_bind_param($stmt_consulta, "s", $cpf);
        mysqli_stmt_execute($stmt_consulta);
        $resultado = mysqli_stmt_get_result($stmt_consulta);

        if (mysqli_num_rows($resultado) > 0) {
            // O registro já existe, mas não é permitido modificar o CPF ou senha

            $atualizar_dados = "UPDATE onibus SET chassi = ?, placa = ?, cor = ?, assentos = ?, pontosparada = ?, modelo = ? WHERE cpf = ?";
            $stmt_atualizar = mysqli_prepare($conexao, $atualizar_dados);
            if ($stmt_atualizar) {
                mysqli_stmt_bind_param($stmt_atualizar, "sssssss", $chassi, $placa, $cor, $assentos, $pontosparada, $modelo, $cpf);

                if (mysqli_stmt_execute($stmt_atualizar)) {
                    // Usuário atualizado, Redirecionar para a página de menu
                    mysqli_stmt_close($stmt_atualizar);
                    mysqli_stmt_close($stmt_consulta);
                    mysqli_close($conexao);
                    header("Location: http://localhost/site-onibus/login.html");
                    exit();
                } else {
                    echo "Erro ao atualizar o usuário: " . mysqli_stmt_error($stmt_atualizar);
                }
            } else {
                echo "Erro ao preparar a declaração de atualização: " . mysqli_error($conexao);
            }

            // Fechar o statement de atualização
            mysqli_stmt_close($stmt_atualizar);
        } else {
            // O registro não existe, realizar a inserção
            $inserir_dados = "INSERT INTO onibus (cpf, chassi, placa, cor, assentos, pontosparada, modelo) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt_inserir = mysqli_prepare($conexao, $inserir_dados);
            if ($stmt_inserir) {
                mysqli_stmt_bind_param($stmt_inserir, "sssssss", $cpf, $chassi, $placa, $cor, $assentos, $pontosparada, $modelo);

                if (mysqli_stmt_execute($stmt_inserir)) {
                    // Usuário inserido, Redirecionar para a página de menu
                    mysqli_stmt_close($stmt_inserir);
                    mysqli_stmt_close($stmt_consulta);
                    mysqli_close($conexao);
                    header("Location: http://localhost/site-onibus/login.html");
                    exit();
                } else {
                    echo "Erro ao inserir o usuário: " . mysqli_stmt_error($stmt_inserir);
                }
            } else {
                echo "Erro ao preparar a declaração de inserção: " . mysqli_error($conexao);
            }

            // Fechar o statement de inserção
            mysqli_stmt_close($stmt_inserir);
        }

        // Fechar o statement de consulta
        mysqli_stmt_close($stmt_consulta);
    } else {
        echo "Erro ao preparar a declaração de consulta: " . mysqli_error($conexao);
    }
}

?>
