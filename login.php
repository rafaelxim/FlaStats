<?php



$login= $_POST["login"];
$senha= $_POST["senha"];
$servidor ="mysql.hostinger.com.br";
$usuario_bd = "u975631064_rafsx";
$senha_bd= "AaAa14041404";
$banco = "u975631064_flast";

$con = mysqli_connect($servidor, $usuario_bd, $senha_bd, $banco);

if (!$con) die ("Erro de conexão");

$resultado = mysqli_query($con, "SELECT * FROM usuarios where login='$login'");
$linhas= mysqli_num_rows($resultado);
if($linhas==0)
{
	echo "usuario nao encontrado" ;
}

else 
{
	$dados=mysqli_fetch_array($resultado);
	$senha_banco=$dados["senha"];
	if( $senha != $senha_banco) echo "senha incorreta";
	else
	{ 
		setcookie("nome_usuario",$login);
		setcookie("senha_usuario",$senha);
		header("Location: inserir.php");
	}
}

mysqli_close($con);
?>