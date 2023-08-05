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
    require("conexao.php");

    // Consulta os dados na tabela "pontosdeparada"
    $consulta_dados = "SELECT chassi, nome, horario FROM pontosdeparada";
    $resultado = mysqli_query($conexao, $consulta_dados);

    if (mysqli_num_rows($resultado) > 0) {
        // Exibe os dados em uma tabela
        echo '<table class="tabela">';
        echo '<tr>    <th class="onibus-th">Chassi</th>  <th class=horario-th">Horário</th> <th class="rota-th">Rota</th>   <th class="td-vazio"></th>     </tr>';
        while ($row = mysqli_fetch_assoc($resultado)) {
            echo '<tr>';
            
            echo '<td class="">' . $row['chassi'] . '</td>';

            echo '<td>' . $row['horario'] . '</td>';

            echo '<td>' . $row['nome'] . '</td>';
            echo '<td class="td-vazio"></td>';
            echo '</tr>';


        }
            
          
          
            echo '<form action="cadastro-rotas.php" method="post">';
            echo ' <tr>';
            echo '  <td> <input type="number" value="chassi" placeholder="chassi-onibus" name="chassi" require></td>';
            echo '  <td class="td-cadastrar"> <input class="input" type="time" name="horario" placeholder="Horario" require></td>';
            echo ' <td class="td-cadastrar"><input class="input" type="text" name="nome" placeholder="rota"  require></td> ';
            echo ' <div class="botao"> <td class="td-vazio td-cadastrar" >  <input class="btn input" type="submit" value="cadastrar"> </td> </div>';
            echo '</tr>';
            echo '</form>';

        
        echo '</table>';
    } else {
        echo "Nenhum dado encontrado.";
    }

    // Fechar a conexão
    mysqli_close($conexao);
    ?>



















</div>


    
</body>
</html>