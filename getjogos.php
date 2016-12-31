testando
<?php

$mysqli = new mysqli("localhost", "root", "", "flastats");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!($stmt = $mysqli->prepare("SELECT * FROM jogos WHERE id!=5000 ORDER BY id DESC"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

$stmt->bind_result($id, $data, $horario, $times);

 /* fetch values */
 while ($stmt->fetch()) {
 	$newDate = date("d/m/Y", strtotime($data));
        printf ("<tr><td> %s </td><td> %s </td><td> %s </td></tr> \n", $id, $newDate, $times);
 }

    /* close statement */
 $stmt->close();

?>
