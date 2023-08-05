<?php

     $dbHost = 'Localhost';
     $dbUsername = 'root';
     $dbPassword = '0512';
     $dbName = 'LOGINSITE';


     $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

     if($conexao->connect_errno){
    
         echo "erro";

     }
     else{

      echo "conexao efetuada com sucesso";

     }

/////////////////////////////////////////////inserçao dados////////////////////////////////////////////////////////////////////////////

   //  $cpf  = $_POST ['cpf'];
     //$senha  = $_POST ['senha'];
     //$cit  = $_POST ['cit'];
    // $tell  = $_POST ['tell'];
    // $funcao  = $_POST ['funcao'];



  //   $sql = "INSERT INTO passageiro (cpf,senha,cit,tell,funcao) VALUES ('$nome','$senha','$cit','$tell','$funcao')";


?>