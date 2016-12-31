<?php



$login= $_POST["login"];
$senha= $_POST["senha"];
$servidor ="localhost";
$usuario_bd = "root";
$senha_bd= "";
$banco = "flastats";

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