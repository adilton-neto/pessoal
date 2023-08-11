<?php
session_start();

if (!isset($_SESSION['cpf'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['pafh'])) {
    $comprovantePath = $_GET['pafh'];
    
    // Verifica se o arquivo existe antes de exibir
    if (file_exists($comprovantePath)) {
        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename=comprovante.pdf");
        @readfile($comprovantePath);
    } else {
        echo "Arquivo não encontrado.";
    }
} else {
    echo "Parâmetro 'pafh' ausente.";
}
?>
