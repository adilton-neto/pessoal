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

        // Consulta SQL para buscar as informações do usuário
        $query = "SELECT nome, pontoparada, cidademomento, formacontato, onibus FROM passageiro WHERE cpf = '$cpf' AND senha = '$senha'";
        $result = mysqli_query($conexao, $query);

?>

<?php
        // Verifique se encontrou algum usuário
        if (mysqli_num_rows($result) > 0) {
         
            $dadosUsuario = mysqli_fetch_assoc($result);

            ?>


               <div class="intem"> <i class="fa-solid fa-user icone"></i> <h3 class="nome-padrao">Nome: </h3> <p class="nome-receber" > <?php echo $dadosUsuario['nome']  ?> </p> </div>
               <div class="intem">  <i class="fa-sharp fa-solid fa-location-dot icone"></i>  <h3 class="nome-padrao">Ponto de Parada: </h3>  <p class="nome-receber" > <?php echo  $dadosUsuario['pontoparada'] ?> </p>  </div>
               <div class="intem"> <i class="fa-solid fa-city icone"></i> <h3 class="nome-padrao">Cidade Momento: </h3> <p class="nome-receber" > <?php echo $dadosUsuario['cidademomento']  ?> </p> </div>
               <div class="intem">  <i class="fa-sharp fa-solid fa-phone icone"></i> <h3 class="nome-padrao">Forma de Contato: </h3> <p class="nome-receber" > <?php echo  $dadosUsuario['formacontato'] ?> </p> </div>
               <div class="intem"> <i class="fa-sharp fa-solid fa-bus icone"></i> <h3 class="nome-padrao">Ônibus: </h3> <p class="nome-receber" > <?php echo $dadosUsuario['onibus'] ?> </p> </div>
       
       
     <?php
       
        } else {
            
            echo "CPF ou senha incorretos.";
        }

        mysqli_close($conexao);
    } else {    
        //header("Location: login.php");
        //exit();
        echo "n esta logado";
    }
    ?>
  </div>
</div>    

</body>
</html>


    

