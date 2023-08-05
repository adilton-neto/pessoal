<?php

include("conexao.php"); 

var_dump($_FILES);
if(isset($_FILES['arquivo'])){
  $arquivo = $_FILES['arquivo'];

  if($arquivo['error'])
  die("falha ao enviar arquivo");
  if($arquivo['size'] > 8589934592)
         die(  "arquivo muito grande!! Max:8MB" );
    echo"arquivo enviado";

   $pasta = "arquivos-comprovantes/"; 
   $nomeDoArquivo = $arquivo['name'];
   $novoNomeDoArquivo = uniqid();
 $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

if($extensao != "jpg" && $extensao != 'png')
       die("tipo de arquivo invalido,apenas arquivos jpg e png! ");

      $deu_certo = move_uploaded_file($arquivo["temp_name"], $pasta . $novoNomeDoArquivo . "." . $extensao);

        if($deu_certo){

$mysqli->query("INSERT INTO arquivos (nome, path, dataupload) VALUES('', '')");


      //echo"<p> Arquivo enviado com sucesso ! </p>";

        }else
      echo "falha ao enviar arquivo";
}




// uniqid  gera um unificador (id) unico no momento que nao vai ser repetido 

?>