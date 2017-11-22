<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="./css/cadastro.css"/>
		<script type="text/javascript" src="./js/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" media="(max-width: 980px)" href="./css/Rcadastro.css"/>
	</head>
	<body>
	<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$csenha = $_POST['csenha'];

		$usuario = "root";
		$senhaBD = "";
		$servidor = "localhost";
		$bddnome = "cadastro";
		header('Content-Type: text/html, charset-utf-8');
		$conexao = mysqli_connect($servidor,$usuario,$senhaBD,$bddnome);

		if(!$conexao){
			echo "Não há conexão com o Banco";
		}
		if(isset($nome) and empty($nome) == true or isset($email) and empty($email) == true or isset($senha) and empty($senha) == true or isset($csenha) and empty($csenha) == true){
			?>
			<script type="text/javascript">
			alert("Um ou mais formulários não foram preenchidos");
			</script>
			<?php
		}
		else{
			if($senha == $csenha){

				mysqli_query($conexao, "INSERT INTO usuario (nome, email, senha)
					VALUES('$nome','$email','$senha')");

					header("location: index.php");
					exit();
				}
			else{
				?>

			<script type="text/javascript">
			alert("Confirmação de senha incorreta");
			</script>

			<?php
			}

		}
	}
?>
		<div>
			<a href="index.php"><img src="./img/filme.jpeg"></a>
			<form action="cadastro.php" method="POST">
				<input type="text" placeholder="Digite seu nome..." name="nome" required class="input">
				<input type="email" placeholder="Digite seu email..." name="email" required class="input">
				<input type="password" name="senha" placeholder="Digite sua senha..." required class="input">
				<input type="password" name="csenha" placeholder="Confirme sua senha..." required class="input">
				<input type="submit" placeholder="ENTRAR" name="enter" class="envio">
			</form>
		</div>
	</body>
</html>
