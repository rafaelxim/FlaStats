<?php

$mysqli = new mysqli("localhost", "root", "", "flastats");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!($stmt = $mysqli->prepare("SELECT data, titulo FROM noticias ORDER BY id DESC"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}


if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

$stmt->bind_result($data, $titulo);

 /* fetch values */

 while ($stmt->fetch()){ 
 	$date = date_create($data);
 	$datafinal= date_format($date, 'd/m/Y');
    printf ("<p> %s -<a href='#'> %s </a></p>",$datafinal, $titulo);
}

     
 $stmt->close();

?>