<?php
if(IsSet($_COOKIE["nome_usuario"]))
$nome_usuario = $_COOKIE["nome_usuario"];
if(IsSet($_COOKIE["senha_usuario"]))
$senha_usuario = $_COOKIE["senha_usuario"];

if(!(empty($nome_usuario) OR empty($senha_usuario)))
{
	$servidor ="mysql.hostinger.com.br";
$usuario_bd = "u975631064_rafsx";
$senha_bd= "AaAa14041404";
$banco = "u975631064_flast";

$con = mysqli_connect($servidor, $usuario_bd, $senha_bd, $banco);

if (!$con) die ("Erro de conexão");

	$resultado= mysqli_query($con, "SELECT * FROM usuarios WHERE login='$nome_usuario'");

	if(mysqli_num_rows($resultado)==1)
	{
		$dados = mysqli_fetch_array($resultado);
		$senha_banco=$dados["senha"];
		if($senha_usuario != $senha_banco)
		{
			setcookie("nome_usuario");
			setcookie("senha_usuario");
			echo "Você não efetuou o login" ;
			exit;
		}
	}
	else
	{
		setcookie("nome_usuario");
		setcookie("senha_usuario");
		echo "Você não efetuou o login" ;
		exit;
	}
}
else
{
	echo "Você não efetuou o login" ;
	exit;
}
mysqli_close($con);

?>