<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>stats</title>
</head>
<body>
<?php
	include "valida_cookies.inc";
	$mysqli = new mysqli("mysql.hostinger.com.br", "u858014573_rafsx", "14041404", "u858014573_rafsx");
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
	

	<form method="post" action="novojogo.php">
	<label for="id">ID</label> 
	<input type="text" name="id" placeholder="120"></input><br>
	<label for="novojogo">INSERIR JOGO</label> 
	<input type="text" name="novojogo" placeholder="Flamengo x Vasco"></input><br>
	<label for="data">DATA</label> 
	<input type="text" name="data" placeholder="YYYY-mm-dd"></input><br>
	<input type="submit"  value="enviar"></input>
	</form>

	<hr>

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

	<hr>

	<form method="post" action="noticias_update.php">
	<label for="url">URL</label> 
	<input type="text" name="url" placeholder="http://google.com/imagem.jpg"></input><br>
	
	<label for="titulo">Titulo da noticia</label>
	<input type="text" name="titulo" placeholder="Flamengo contrata Ronaldinho Gaúcho"></input><br>

	<label for="fonte">Fonte</label>
	<input type="text" name="fonte" placeholder="ESPN"></input><br>

	<label for="texto">Notícia</label>
	<textarea style="width: 600px; height: 300px;" name="texto"><br><br><a href="LINKAQUI" target="_blank">Leia mais </a></textarea>

	<input type="submit"  value="enviar"></input>
	</form>
</body>
</html>