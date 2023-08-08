<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    






<!--    verifica se for motorista e se codifo e igaul a M0T0R1ST42060 -->


<?php
// include("conexao.php");

// $cpf = $_POST['cpf'];
// $senha = $_POST['senha'];
// $cit = $_POST['cit'];
// $tell = $_POST['tell'];
// $funcao = $_POST['funcao'];
// $codigo = $_POST['codigo'];

// if ($funcao === "passageiro") {
//     // Cadastro na tabela passageiro
//     $sql = "INSERT INTO passageiro (cpf, senha, cit, tell, funcao) VALUES ('$cpf', '$senha', '$cit', '$tell', '$funcao')";
// } elseif ($funcao === "motorista" && $codigo === "M0T0R1ST42060") {
//     // Cadastro na tabela motorista
//     $sql = "INSERT INTO motorista (cpf, senha, cit, tell, funcao, codigo) VALUES ('$cpf', '$senha', '$cit', '$tell', '$funcao', '$codigo')";
// } else {
//     echo "Código inválido ou função inválida. Por favor, verifique os dados.";
//     exit();
// }

// if (mysqli_query($conexao, $sql)) {
//     //echo "Usuário cadastrado com sucesso!!";
//     header("location: tela1passageiro-criar-perfil\index.html");
//     exit();
// } else {
//     echo "Erro ao cadastrar usuário: " . mysqli_error($conexao);
// }

// mysqli_close($conexao);
?>






<!-- SEGUINDO O CODIGO A CIMA E SE CadastroCONCLUIDO COM SUCESSO REDIRECIONA A PAGINA -->







<?php
include("conexao.php");

$cpf = $_POST['cpf'];
$senha = $_POST['senha'];
$cit = $_POST['cit'];
$tell = $_POST['tell'];
$funcao = $_POST['funcao'];
$codigo = $_POST['codigo'];

if ($funcao === "passageiro") {
    // Cadastro na tabela passageiro
    $sql = "INSERT INTO passageiro (cpf, senha, cit, tell, funcao) VALUES ('$cpf', '$senha', '$cit', '$tell', '$funcao')";
} elseif ($funcao === "motorista" && $codigo === "M0T0R1ST42060") {
    // Cadastro na tabela motorista
    $sql = "INSERT INTO motorista (cpf, senha, cit, tell, funcao, codigo) VALUES ('$cpf', '$senha', '$cit', '$tell', '$funcao', '$codigo')";
} else {
    echo "Código inválido ou função inválida. Por favor, verifique os dados.";
    exit();
}

if (mysqli_query($conexao, $sql)) {
    // Cadastro concluído com sucesso
    if ($funcao === "motorista") {
        header("location: ../site-onibus/motorista/motorista-criar-perfil\index.html"); // Redireciona para a página do motorista
    } else {
        header("location: ../site-onibus/passageiro/tela1passageiro-criar-perfil\index.html"); // Redireciona para a página do passageiro
    }   
    exit();
} else {
    echo "Erro ao cadastrar usuário: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>






</body>
</html>

