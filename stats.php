<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>stats</title>
</head>
<body>
<?php
	$mysqli = new mysqli("localhost", "root", "", "flastats");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!($stmt = $mysqli->prepare("SELECT nome, jogadores.id FROM jogadores, stats WHERE jogadores.id= stats.id_jogador and stats.id_jogo=(?)"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}
$tabela_id_jogo = 5000;
$stmt->bind_param("i", $tabela_id_jogo);

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

$stmt->bind_result($nome,$id);

?>

	<form method="post" action="stats_update.php">
	<select name="jogador"> 
	<?php
	while ($stmt->fetch()) {
        printf ("<option value='%s'> %s </option>\n", $id, $nome);
    }
        ?>		
	</select><br>
	<label for="total_certo">Total certo</label> 
	<input type="text" name="total_certo" ></input><br>
	
	<label for="total_errado">Total errado</label>
	<input type="text" name="total_errado"></input><br>

	<label for="decisivo_certo">decisivo certo</label>
	<input type="text" name="decisivo_certo"></input><br>

	<label for="decisivo_errado">decisivo errado</label>
	<input type="text" name="decisivo_errado"></input><br>

	<label for="longo_certo">longo certo</label>
	<input type="text" name="longo_certo"></input><br>

	<label for="longo_errado">longo errado</label>
	<input type="text" name="longo_errado"></input><br>

	<label for="id">ID DA PARTIDA</label>
	<input type="text" name="id_partida"></input><br>
	<input type="submit"  value="enviar"></input>
	</form>
</body>
</html>