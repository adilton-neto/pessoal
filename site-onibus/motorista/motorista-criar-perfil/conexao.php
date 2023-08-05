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


?>