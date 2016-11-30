
<?php
$tabela_id_jogo = $_GET['what'];
$mysqli = new mysqli("mysql.hostinger.com.br", "u858014573_rafsx", "14041404", "u858014573_rafsx");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!($stmt = $mysqli->prepare("SELECT nome, total_certo, total_errado, longo_certo, longo_errado, decisivo_certo, decisivo_errado FROM jogadores, stats WHERE jogadores.id= stats.id_jogador and stats.id_jogo=(?)"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}


if (!$stmt->bind_param("i", $tabela_id_jogo)) { // esse 'i' é de INTEGER
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

$stmt->bind_result($nome,$total_certo,$total_errado,$longo_certo,$longo_errado,$decisivo_certo,$decisivo_errado);

 /* fetch values */
 while ($stmt->fetch()) {
        printf ("<tr><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td></tr> \n", $nome,$total_certo,$total_errado,$longo_certo,$longo_errado,$decisivo_certo,$decisivo_errado);
 }

    /* close statement */
 $stmt->close();

?>