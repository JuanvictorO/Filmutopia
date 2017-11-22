<?php
	session_start();
	$number = 1;

	$usuario = "root";
		$senhaBD = "";
		$servidor = "localhost";
		$bddnome = "cadastro";
		header('Content-Type: text/html, charset-utf-8');
		$conexao = mysqli_connect($servidor,$usuario,$senhaBD,$bddnome);

	if(!isset($_SESSION['usuario'])){
		header('location: index.php');
		exit();
	}
	$nome = $_SESSION['usuario'];
	$id = $_SESSION['id'];
	$nome_perfil="perfil.jpeg";

	if($_SERVER['REQUEST_METHOD']=="POST"){


		$x = $_POST['coment'];
		if(isset($x)){
			mysqli_query($conexao,"INSERT INTO comentar(idFilme, idUsuario, coment)
				VALUES('1','$id','$x')");
		}
		else{
			exit();
		}
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Filmutopia
	</title>
</head>
<header>
	<ul>
		<li><img src="./img/filme.jpeg"/></li>
		<li></li>
		<li>
			<div>
				<img src="./foto_usuario/
		<?php 
			if(!file_exists('foto_usuario/'.$id)){
				echo "anonimo.jpeg";
			}
			else{
				echo $nome_perfil;
			}
		?>
		"/>
		<h3>
			<?php
			echo $nome;
			?>
		</h3>
		<a href="index.php"><h3>
		LOGOUT
		</h3></a>
			</div>
		</li>
</header>
<body>

</body>
<footer>


<?php
	$select = mysqli_query($conexao,'SELECT c.idFilme, c.idUsuario, c.coment, u.nome FROM comentar c JOIN usuario u ON c.idUsuario = u.id WHERE c.idFilme =1');
	while($linha = mysqli_fetch_array($select)){
		$comentario = $linha['coment'];
		$nome = $linha['nome'];
		$id = $linha['idUsuario'];
?>
<div>
	<img src="./foto_usuario/ <?php
	echo $id;
	?>
	/perfil.jpg"/>
	<h3><?php echo $nome; ?></h3>
	<div>
		<p><?php echo $comentario; ?></p>
	</div>
</div>
<?php	
	}
?>


	<form method="POST" action="teste.php">
		<input type="text" name="coment" maxlength="250">
		<input type="submit" name="">
	</form>
</footer>
</html>