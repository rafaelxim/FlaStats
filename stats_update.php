<?php

$jogador = $_POST['jogador'];
$partida = $_POST['id_partida'];
$tc = $_POST['total_certo'];
$te = $_POST['total_errado'];
$dc = $_POST['decisivo_certo'];
$de = $_POST['decisivo_errado'];
$lc = $_POST['longo_certo'];
$le = $_POST['longo_errado'];


$mysqli = new mysqli("localhost", "root", "", "flastats");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!($stmt = $mysqli->prepare("INSERT INTO stats (total_certo, total_errado, decisivo_certo, decisivo_errado,longo_certo, longo_errado, id_jogador, id_jogo) VALUES ((?),(?),(?),(?),(?),(?),(?),(?))"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

$stmt->bind_param("iiiiiiii", $tc, $te, $dc, $de, $lc, $le, $jogador, $partida);

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}