<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>cadastrar rotas</title>
</head>
<body>


         
    <style>


        table {
            border-collapse: collapse;
            width: 85%;
  margin-left:17vh;
           

        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
            

        }

        td{
     
         
           
        }

        th {
            background-color: #f2f2f2;
           
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .input{
            border:none;
            
        }

        .td-cadastrar{
            height:7vh;
        }

        .horario-th{
            width:15%;
       

        }

        .rota-th{
            width:40%;
            
        }

        .onibus-th{
            width:20%;

        }

        .td-vazio{
            width: 25%;
        }


    </style>



<div class="box">
        <div class="heater">
             <h1 class="ttk"> BUS NLT</h1>
             <div class="cximg">
            <img class="imagem" src="banner-lateral-campus-urucuca.png" alt="">
        </div>
        </div> 
         <div class="titulo">
            <h2 class="tt1">Cadastre as rotas do onibus sugerido!</h2>
           
         </div>





    <?php
//     require("conexao.php");

//     // Consulta os dados na tabela "pontosdeparada"
//     $consulta_dados = "SELECT chassi, nome, horario FROM pontosdeparada";
//     $resultado = mysqli_query($conexao, $consulta_dados);

//     if (mysqli_num_rows($resultado) > 0) {
//         // Exibe os dados em uma tabela
//         echo '<table class="tabela">';
//         echo '<tr>    <th class="onibus-th">Chassi</th>  <th class=horario-th">Horário</th> <th class="rota-th">Rota</th>   <th class="td-vazio"></th>     </tr>';
//         while ($row = mysqli_fetch_assoc($resultado)) {
//             echo '<tr>';
            
//             echo '<td class="">' . $row['chassi'] . '</td>';

//             echo '<td>' . $row['horario'] . '</td>';

//             echo '<td>' . $row['nome'] . '</td>';
//             echo '<td class="td-vazio"></td>';
//             echo '</tr>';


//         }
//    //  site-onibus\motorista\cadastrar-rotas\cadastro-rotas.php
            
          
          
//             echo '<form action=" site-onibus\motorista\cadastrar-rotas\cadastro-rotas.php" method="post">';
//             echo ' <tr>';
//             echo '  <td> <input type="number" value="chassi" placeholder="chassi-onibus" name="chassi" require></td>';
//             echo '  <td class="td-cadastrar"> <input class="input" type="time" name="horario" placeholder="Horario" require></td>';
//             echo ' <td class="td-cadastrar"><input class="input" type="text" name="nome" placeholder="rota"  require></td> ';
//             echo ' <div class="botao"> <td class="td-vazio td-cadastrar" >  <input class="btn input" type="submit" value="cadastrar"> </td> </div>';
//             echo '</tr>';
//             echo '</form>';

        
//         echo '</table>';
//     } else {



//         require("conexao.php");
    
//             echo '<table class="tabela">';
//             echo '<tr>    <th class="onibus-th">Chassi</th>  <th class=horario-th">Horário</th> <th class="rota-th">Rota</th>   <th class="td-vazio"></th>     </tr>';
        
//                 echo '<tr>';
                
//                 echo '<td class=""><p>chassi</p> </td>';
    
//                 echo '<td> <p>horario</p> </td>';
    
//                 echo '<td> <p>nome</p> </td>';
//                 echo '<td class="td-vazio"></td>';
//                 echo '</tr>';
    
    
    
//        //  site-onibus\motorista\cadastrar-rotas\cadastro-rotas.php
                
              
              
//                 echo '<form action=" site-onibus\motorista\cadastrar-rotas\cadastro-rotas.php" method="post">';
//                 echo ' <tr>';
//                 echo '  <td> <input type="number" value="chassi" placeholder="chassi-onibus" name="chassi" require></td>';
//                 echo '  <td class="td-cadastrar"> <input class="input" type="time" name="horario" placeholder="Horario" require></td>';
//                 echo ' <td class="td-cadastrar"><input class="input" type="text" name="nome" placeholder="rota"  require></td> ';
//                 echo ' <div class="botao"> <td class="td-vazio td-cadastrar" >  <input class="btn input" type="submit" value="cadastrar"> </td> </div>';
//                 echo '</tr>';
//                 echo '</form>';
    
            
//             echo '</table>';


       
       
//             echo "Nenhum dado encontrado.";
//     }

//     // Fechar a conexão
//     mysqli_close($conexao);
    ?>






<?php
require("conexao.php");

// Lidar com o formulário de cadastro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $chassi = $_POST['chassi'];
    $horario = $_POST['horario'];
    $nome = $_POST['nome'];

    $inserir_dados = "INSERT INTO pontosdeparada (chassi, horario, nome) VALUES (?, ?, ?)";
    $stmt_inserir = mysqli_prepare($conexao, $inserir_dados);
    mysqli_stmt_bind_param($stmt_inserir, "sss", $chassi, $horario, $nome);

    if (mysqli_stmt_execute($stmt_inserir)) {
        mysqli_stmt_close($stmt_inserir);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Erro ao inserir os dados: " . mysqli_stmt_error($stmt_inserir);
    }
}

// Consulta os dados na tabela "pontosdeparada"
$consulta_dados = "SELECT chassi, nome, horario FROM pontosdeparada";
$resultado = mysqli_query($conexao, $consulta_dados);

echo '<form action="' . $_SERVER['PHP_SELF'] . '" method="post">';
echo '  <table class="tabela">';
echo '    <tr>';
echo '      <th class="onibus-th">Chassi</th>';
echo '      <th class="horario-th">Horário</th>';
echo '      <th class="rota-th">Rota</th>';
echo '      <th class="td-vazio"></th>';
echo '    </tr>';

while ($row = mysqli_fetch_assoc($resultado)) {
    echo '    <tr>';
    echo '      <td class="">' . $row['chassi'] . '</td>';
    echo '      <td>' . $row['horario'] . '</td>';
    echo '      <td>' . $row['nome'] . '</td>';
    echo '      <td class="td-vazio"></td>';
    echo '    </tr>';
}

echo '    <tr>';
echo '      <td> <input type="number" placeholder="chassi-onibus" name="chassi" required></td>';
echo '      <td class="td-cadastrar"> <input class="input" type="time" name="horario" placeholder="Horario" required></td>';
echo '      <td class="td-cadastrar"><input class="input" type="text" name="nome" placeholder="rota"  required></td>';
echo '      <td class="td-vazio td-cadastrar"><input class="btn input" type="submit" value="Cadastrar"></td>';
echo '    </tr>';

echo '  </table>';
echo '</form>';

if (mysqli_num_rows($resultado) == 0) {
    echo "Nenhum dado encontrado.";
}

// Fechar a conexão
mysqli_close($conexao);
?>

<div class="btn-concluido-cixa">

             <a href="http://localhost//site-onibus/login.html?"><button class="btn-concluido" type="button">concluido</button></a>                          
             
</div>









</div>


    
</body>
</html>