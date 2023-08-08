<?php

include("conexao.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $horarioSegunda = $_POST['horarioSegunda'];
    $horarioTerca = $_POST['horarioTerca'];
    $horarioQuarta = $_POST['horarioQuarta'];
    $horarioQuinta = $_POST['horarioQuinta'];
    $horarioSexta = $_POST['horarioSexta'];

    $sql = "UPDATE horarioSemanal SET horarioSegunda = ?, horarioTerca = ?, horarioQuarta = ?, horarioQuinta = ?, horarioSexta = ? WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "sssssi", $horarioSegunda, $horarioTerca, $horarioQuarta, $horarioQuinta, $horarioSexta, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "<p>Horário alterado com sucesso!</p>";
    } else {
        echo "Erro ao alterar o horário: " . mysqli_error($conexao);
    }

    mysqli_stmt_close($stmt);
}

// Consulta os horários na tabela horarioSemanal
$consulta = "SELECT * FROM horarioSemanal";
$result = mysqli_query($conexao, $consulta);

if (mysqli_num_rows($result) > 0) {
    // Exibir os horários em um formulário para edição
    echo '<table border="1">';
    echo '<tr><th>ID</th><th>Segunda-feira</th><th>Terça-feira</th><th>Quarta-feira</th><th>Quinta-feira</th><th>Sexta-feira</th><th>Ação</th></tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<form method="post">';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td><input type="time" name="horarioSegunda" value="' . $row['horarioSegunda'] . '"></td>';
        echo '<td><input type="time" name="horarioTerca" value="' . $row['horarioTerca'] . '"></td>';
        echo '<td><input type="time" name="horarioQuarta" value="' . $row['horarioQuarta'] . '"></td>';
        echo '<td><input type="time" name="horarioQuinta" value="' . $row['horarioQuinta'] . '"></td>';
        echo '<td><input type="time" name="horarioSexta" value="' . $row['horarioSexta'] . '"></td>';
        echo '<td><input type="hidden" name="id" value="' . $row['id'] . '"><input type="submit" value="Alterar"></td>';
        echo '</form>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo "Nenhum horário cadastrado.";
}

mysqli_close($conexao);
?>
