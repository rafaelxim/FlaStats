<?php

$novojogo = $_POST['novojogo'];
$data = $_POST['data'];
$id = $_POST['id'];
$horario=null;
echo $novojogo;


$mysqli = new mysqli("localhost", "root", "", "flastats");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!($stmt = $mysqli->prepare("INSERT INTO jogos VALUES ((?),(?),(?),(?))"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

$stmt->bind_param("isss",$id, $data, $horario, $novojogo);

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}