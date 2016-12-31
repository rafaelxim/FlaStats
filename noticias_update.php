<?php

$url = $_POST['url'];
$titulo = $_POST['titulo'];
$fonte = $_POST['fonte'];
$texto = $_POST['texto'];
$data = date("Y-m-d");


$mysqli = new mysqli("localhost", "root", "", "flastats");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!($stmt = $mysqli->prepare("INSERT INTO noticias (url, titulo, fonte, texto, data) VALUES ((?),(?),(?),(?),(?))"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

$stmt->bind_param("sssss", $url, $titulo, $fonte, $texto, $data);

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}