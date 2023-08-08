<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-calendario.css">
    <title>Document</title>
</head>
<body>





<div class="caixa">


<table class="tabela" border="1">
        <tr>
            <th>MOTORISTAS</th>
            <th>SEGUNDA</th>
            <th>TERÇA</th>
            <th>QUARTA</th>
            <th>QUINTA</th>
            <th>SEXTA</th>
            <th>ALTERAR</th>
            
        </tr>
       

        <?php
 include("conexao.php");
     
     $id = 1;
     
     $query = "SELECT horarioSegunda, horarioTerca, horarioQuarta, horarioQuinta, horarioSexta FROM horarioSemanal WHERE id = $id";
     $result = mysqli_query($conexao, $query);
     
     if ($result && mysqli_num_rows($result) > 0) {
         $dadosUsuario = mysqli_fetch_assoc($result);
         ?>
          <tr>
            <tH><a href="">jaime</a></tH>
            <td><p class="alterar"> <?php echo  $dadosUsuario['horarioSegunda'] ?></p></td>
            <td > <p class="alterar"><?php echo  $dadosUsuario['horarioTerca'] ?></p></td>
            <td> <p class="alterar"> <?php echo  $dadosUsuario['horarioQuarta'] ?></p></td>
            <td> <p class="alterar"> <?php echo  $dadosUsuario['horarioQuinta'] ?></p></td>
            <td> <p class="alterar"> <?php echo  $dadosUsuario['horarioSexta'] ?></p></td>
            <td ><a class="alterar" href="alterar_horario.php?id=' . getRowId($row) . '">Alterar Horário</a></td> 
           
        </tr>
<?php
    } else {
        echo "Nenhum dado encontrado para o ID $id.";
    }
    
    mysqli_close($conexao);
    ?>



<?php
    include("conexao.php");
     
     $id = 2;
     
     $query = "SELECT horarioSegunda, horarioTerca, horarioQuarta, horarioQuinta, horarioSexta FROM horarioSemanal WHERE id = $id";
     $result = mysqli_query($conexao, $query);
     
     if ($result && mysqli_num_rows($result) > 0) {
         $dadosUsuario = mysqli_fetch_assoc($result);

  ?>       
        <tr>
            <th>Cesar</th>
            <td><p class="alterar"> <?php echo  $dadosUsuario['horarioSegunda'] ?></p></td>
            <td > <p class="alterar"><?php echo  $dadosUsuario['horarioTerca'] ?></p></td>
            <td> <p class="alterar"> <?php echo  $dadosUsuario['horarioQuarta'] ?></p></td>
            <td> <p class="alterar"> <?php echo  $dadosUsuario['horarioQuinta'] ?></p></td>
            <td> <p class="alterar"> <?php echo  $dadosUsuario['horarioSexta'] ?></p></td>
            <td ><a class="alterar" href="alterar_horario.php?id=' . getRowId($row) . '">Alterar Horário</a></td> 
            
        </tr>

        <?php
    } else {
        echo "Nenhum dado encontrado para o ID $id.";
    }
    
    mysqli_close($conexao);
    ?>

<?php
   
   include("conexao.php");
   $id = 3;
   
   $query = "SELECT horarioSegunda, horarioTerca, horarioQuarta, horarioQuinta, horarioSexta FROM horarioSemanal WHERE id = $id";
   $result = mysqli_query($conexao, $query);
   
   if ($result && mysqli_num_rows($result) > 0) {
       $dadosUsuario = mysqli_fetch_assoc($result);

?> 
        <tr>
            <th>Deu</th>
            <td><p class="alterar"> <?php echo  $dadosUsuario['horarioSegunda'] ?></p></td>
            <td > <p class="alterar"><?php echo  $dadosUsuario['horarioTerca'] ?></p></td>
            <td> <p class="alterar"> <?php echo  $dadosUsuario['horarioQuarta'] ?></p></td>
            <td> <p class="alterar"> <?php echo  $dadosUsuario['horarioQuinta'] ?></p></td>
            <td> <p class="alterar"> <?php echo  $dadosUsuario['horarioSexta'] ?></p></td>
            <td ><a class="alterar" href="alterar_horario.php?id=' . getRowId($row) . '">Alterar Horário</a></td> 
           
        </tr>


        <?php
    } else {
        echo "Nenhum dado encontrado para o ID $id.";
    }
    
    mysqli_close($conexao);
    ?>


<?php
    include("conexao.php");
     
   $id = 4;
   
   $query = "SELECT horarioSegunda, horarioTerca, horarioQuarta, horarioQuinta, horarioSexta FROM horarioSemanal WHERE id = $id";
   $result = mysqli_query($conexao, $query);
   
   if ($result && mysqli_num_rows($result) > 0) {
       $dadosUsuario = mysqli_fetch_assoc($result);

?>
        <tr>
            <th>Diu</tH>
            <td><p class="alterar"> <?php echo  $dadosUsuario['horarioSegunda'] ?></p></td>
            <td > <p class="alterar"><?php echo  $dadosUsuario['horarioTerca'] ?></p></td>
            <td> <p class="alterar"> <?php echo  $dadosUsuario['horarioQuarta'] ?></p></td>
            <td> <p class="alterar"> <?php echo  $dadosUsuario['horarioQuinta'] ?></p></td>
            <td> <p class="alterar"> <?php echo  $dadosUsuario['horarioSexta'] ?></p></td>
            <td ><a class="alterar" href="alterar_horario.php?id=' . getRowId($row) . '">Alterar Horário</a></td> 
            
        </tr>


        <?php
    } else {
        echo "Nenhum dado encontrado para o ID $id.";
    }
    
    mysqli_close($conexao);
    ?>

    </table>


    </div>



</body>
</html>

