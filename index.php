<!doctype html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="./js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/index.css"/>
	<link rel="stylesheet" type="text/css" media="(max-width: 980px)" href="./css/Rindex.css"/>
	<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
	$c = false;
	$email=$_POST['email'];
	$senha=$_POST['senha'];

	$usuario = "root";
	$senhaBD = "";
	$servidor = "localhost";
	$bdnome = "cadastro";
	header('Content-Type: text/html, charset-utf-8');
	$conexao = mysqli_connect($servidor,$usuario,$senhaBD,$bdnome);

	if(!$conexao){
		echo "Não foi possível estabelecer uma coneção com o banco";
	}

	if(isset($email) and empty($email)==true or isset($senha) and empty($senha)==true){
		echo "Um ou mais formulários não foram preenchidos";
	}
	else{
		$select = mysqli_query ($conexao,'SELECT * FROM usuario');
		while($linha = mysqli_fetch_array($select)){
			if($linha['senha'] == $senha && $linha['email'] == $email){
				$c = true;
				$id = $linha['id'];
				$nome = $linha['nome'];
				break;
			}
	}
	if($c == true){
		if(isset($_SESSION['nome']) or isset($_SESSION['id'])){
			session_destroy();
			session_start();
			$_SESSION['id'] = $id;
			$_SESSION['nome'] = $nome;
			header ("location:carousel.php");
			exit();
		}
		else{
			session_start();
			$_SESSION['id'] = $id;
			$_SESSION['usuario'] = $nome;
			header ("Location: carousel.php");
			exit();
		}
	}
	else{
		?>
		<script type="text/javascript">
			$(function(){
				alert('Email ou senha incorretos');
			});
		</script>  
		<?php
	}
}
}
?>
</head>
<body>


	<div>
		<?php
			session_start();
			if(isset($_SESSION['usuario'])){
				session_destroy();
			}
		?>
		<h2>Bem Vindo ao</h2>
		<img src="./img/filme.jpeg"/>
		<form action="#" method="POST">
			<input type="email" placeholder="Digite seu email..." name="email" required class="input">
			<input type="password" name="senha" placeholder="Digite sua senha..." required class="input">
			<input type="submit" placeholder="ENTRAR" name="enter" class="envio">		
		</form>
		<a href="cadastro.php"><button class="envio">Registrar</button></a>
	</div>
	
</body>
</html>