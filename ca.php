<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no"/>
	<link rel="stylesheet" type="text/css" href="./css/corpo.css"/>
	<link rel="stylesheet" type="text/css" href="./css/geralID.css"/>
	<link rel="stylesheet" type="text/css" href="./css/coments.css"/>
	<link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.min.css"/>
	<script type="text/javascript" src="./js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" media="(max-width: 769px)" href="./css/Rcorpo.css"/>

	<link rel="stylesheet" type="text/css" media="(max-width: 769px)" href="./css/RgeralID.css"/>
	<script type="text/javascript">
		$(function(){
			$("button").click(function(){
				$(".usus").fadeIn("slow");
			});
			$("button").blur(function(){
				$(".usus").fadeOut("slow");
			});
		});
	</script>

<?php 
	session_start();
	$c = false;
	$nome_perfil = "perfil.jpg";
	if(!isset($_SESSION['usuario'])){
		header('location: index.php');
	}
	$nome = $_SESSION['usuario'];
	$id = $_SESSION['id'];
	if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST["envio_de_foto"])){
		
		if(!file_exists('foto_usuario/'.$id)){
      		mkdir('foto_usuario/'.$id);  
   		 }
   		 $nome_perfil="perfil.jpeg";
		move_uploaded_file($_FILES['perfil']['tmp_name'],'foto_usuario/'.$id.'/'. $nome_perfil);
	}


	

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
	

	if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['comentar']) and isset($_POST['number'])){

		$y = $_POST['number'];
		if(empty($y)){
			$y = 0;
		}
		$x = $_POST['coment'];
		if(isset($x)){
			mysqli_query($conexao,"INSERT INTO comentar(idFilme, idUsuario, coment, stars)
				VALUES('18','$id','$x', $y)");
		}
		else{
			exit();
		}
	}


?>


	<title>
		Filmutopia
	</title>
</head>
<body>

<header style="top: 0">
	<ul id="ul">
		<li><img src="./img/filme.jpeg" id="logo"/></li>
		<div class="menu-desktop">
		<li><h4><a href="#dados" class="as">Dados</a></h4></li>
		<li><h4><a href="#sinopse" class="as">Sinopse</a></h4></li>
		<li><h4><a href="#trailer" class="as">Trailer</a></h4></li>
		<li><h4><a href="#comentar" class="as">Comentários</a></h4></li>
		</div>
		
	
		<a href="#"><button class="usu">
		<li class="gatilho_logout">
		<img id="usuario" src="./foto_usuario/
		<?php 
			if(!file_exists('foto_usuario/'.$id)){
				echo "anonimo.jpeg";
			}
			else{
				echo $id."/".$nome_perfil;
			}
		?>
		"/>
		</li>
		<li >
		<h3 class="gatilho_logout">
			<?php
			echo $nome;
			?>
		</h3>	
		</li>
		</button></a>
		<a href="index.php"><li class="usus">
			<h3 id="logout">LOGOUT</h3>
		</li></a>
		</ul>
		
</header>
<main style="margin-top: 80px">

<?php
if(!file_exists('foto_usuario/'.$id)){
?>
	<form id="form" method="POST" action="ca.php" enctype="multipart/form-data">
    	<input type="file" name="perfil" value="foto de perfil">
   	 	<input type="submit" name="envio_de_foto">
 	 </form>
<?php
}
else{
?>
<p class="titulo" id="dados">Capitão América: Guerra Civil</p>
	<div>
	<div class="align"  >
	<h3>Ficha Técnica</h3>
	Data de lançamento 28 de abril de 2016<br><br>
Direção: Anthony Russo, Joe Russo<br><br>
Elenco: Chris Evans, Robert Downey Jr., Scarlett Johansson<br><br>
Gêneros Ação, Fantasia<br><br>
Nacionalidade EUA
	</div>
	<img src="./img/ca.jpg" class="img" class="align"/>
	</div>
<p class="titulo2" id="sinopse"> Sinopse </p>
<p class="sinopse">Steve Rogers (Chris Evans) é o atual líder dos Vingadores, super-grupo de heróis formado por Viúva Negra (Scarlett Johansson), Feiticeira Escarlate (Elizabeth Olsen), Visão (Paul Bettany), Falcão (Anthony Mackie) e Máquina de Combate (Don Cheadle). O ataque de Ultron fez com que os políticos buscassem algum meio de controlar os super-heróis, já que seus atos afetam toda a humanidade. Tal decisão coloca o Capitão América em rota de colisão com Tony Stark (Robert Downey Jr.), o Homem de Ferro.</p>
<p class="titulo2" id="trailer"> Trailer</p>
<iframe src="https://www.youtube.com/embed/kTk0G-RPQMc" class="video"></iframe>

<?php
}	
?>
<div class="comentar" id="comentar">
	<h3 id="perfil" style="margin-left:  26vw"><?php if($c == false){ echo "Digite aqui seu comentário"; } else { echo "!Só é permitido um comentário do usuário por filme!";} ?></h3>
		<form method="POST" action="ca.php" style="margin-left:  26vw" style="visibility: <?php if($c == true){ echo "hidden"; } ?>">
			Nota: <input type="radio" name="number" value="1" checked> 1
  			<input type="radio" name="number" value="2"> 2
  			<input type="radio" name="number" value="3">3
  			<input type="radio" name="number" value="4">4
  			<input type="radio" name="number" value="5">5<br/><br/>
			<input type="text" name="coment" maxlength="800" id="post">
			<input type="submit" name="comentar">
		</form>
	</div>
</main>
<footer class="footer">
	<p><strong> <a href="#">SOBRE</a> <span>Autores: Juan Victor e Ana Beatriz</span> 2017 </strong></p>
</footer>
<section>
	<?php
	$select = mysqli_query($conexao,'SELECT c.idFilme, c.idUsuario, c.coment,c.stars, u.nome FROM comentar c JOIN usuario u ON c.idUsuario = u.id WHERE c.idFilme =18');
	while($linha = mysqli_fetch_array($select)){
		$star = $linha['stars'];
		$comentario = $linha['coment'];
		$nomeComent = $linha['nome'];
		$idComent = $linha['idUsuario'];
		if($idComent == $id){
			$c = true;
		}
?>
<div class="pk">
	<section>
	<img src="./foto_usuario/
	<?php
		echo $idComent.'/'.$nome_perfil;
	?>
	" style="width: 50px; height: 50px;"/>
	
	<h3><?php echo $nomeComent." -  Nota: ".$star; ?></h3>
	</section>
	<div>
		<p><?php echo $comentario; ?></p>
	</div>
</div>
<?php	
	}
?>
</section>
</body>
</html>