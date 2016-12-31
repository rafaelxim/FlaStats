
<?php

$mysqli = new mysqli("localhost", "root", "", "flastats");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!($stmt = $mysqli->prepare("SELECT MAX(id) FROM jogos WHERE id<5000 "))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

$stmt->bind_result($id);

 /* fetch values */
$stmt->fetch();
$idrecebido = $id;
 $stmt->close();

$mysqli = new mysqli("localhost", "root", "", "flastats");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!($stmt = $mysqli->prepare("SELECT MAX(stats.decisivo_certo) FROM stats WHERE stats.id_jogo=(?)"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}
if (!$stmt->bind_param("i", $idrecebido)) { // esse 'i' é de INTEGER
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}
if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

$stmt->bind_result($higherpasses);
 /* fetch values */
$stmt->fetch();
$melhorpasse = $higherpasses;
$stmt->close();



$mysqli = new mysqli("localhost", "root", "", "flastats");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!($stmt = $mysqli->prepare("SELECT jogadores.nome, stats.decisivo_certo, jogos.times FROM jogadores, jogos, stats WHERE jogadores.id= stats.id_jogador AND stats.id_jogo=jogos.id AND stats.id_jogo=(?) AND stats.decisivo_certo=(?)"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

if (!$stmt->bind_param("ii", $idrecebido,$melhorpasse)) { // esse 'i' é de INTEGER
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

$stmt->bind_result($nome, $chave, $times);

$stmt->fetch();


printf ("<p>Jogador com mais passes chave no último jogo</p> <P>(%s):</P> <p style='color: rgb(235, 251, 115); text-align: center; margin-bottom: 0px;'>%s</p> <p style='font-size: 15px; text-align: center;'>%s Passes Chave</p> <p  style='text-align: right;'><a style='color: white; text-decoration: underline; font-size: 20px;'  href='estatisticas.html'> Veja as estatísticas completas</a></p>", $times, $nome, $chave  );



    /* close statement */
 $stmt->close();

?>
