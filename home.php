<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no"/>
	<link rel="stylesheet" type="text/css" href="./css/corpo.css"/>
	<script type="text/javascript" src="./js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" media="(max-width: 769px)" href="./css/Rcorpo.css"/>
	<script type="text/javascript">
		$(function(){
			$("button").click(function(){
				$(".usus").fadeIn("slow");
			});
			$("button").blur(function(){
				$(".usus").fadeOut("slow");
			});



			/*var link = "http://localhost/Filmutopia/json.php";
			var xhr = $.get(link);

			xhr.done(function(lista){
				var filmes = JSON.parse(lista);
			});*/

		});
	</script>

<?php 
	session_start();
	$nome_perfil = "perfil.jpg";
	if(!isset($_SESSION['usuario'])){
		header('location: index.php');
	}
	$nome = $_SESSION['usuario'];
	$id = $_SESSION['id'];
	
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$nome_perfil= $_FILES['perfil']['name'];

		if(!file_exists('foto_usuario/'.$id)){
      		mkdir('foto_usuario/'.$id);  
   		 }
   		 $nome_perfil="perfil.jpg";
		move_uploaded_file($_FILES['perfil']['tmp_name'],'foto_usuario/'.$id.'/'. $nome_perfil);
	}

?>
	<title>
		Filmutopia
	</title>
</head>
<body>

<header style="top: 0">
	<ul id="ul" style="padding-left: 0px">
		<li><img src="./img/filme.jpeg" id="logo"/></li>
		<div class="menu-desktop">
		<li><h4><a href="#" class="as">Mais Esperados</a></h4></li>
		<li><h4><a href="#" class="as">Lançamentos</a></h4></li>
		<li><h4><a href="#" class="as">Maior Bilheteria</a></h4></li>
		<li><h4><a href="#" class="as">Séries</a></h4></li>
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
	<h3 id="perfil" style="margin-left:  26vw">Escolha um arquivo para foto de perfil</h3>
	<form id="form" method="POST" action="home.php" enctype="multipart/form-data" style="margin-left: 26vw">
    	<input type="file" name="perfil" value="perfil">
   	 	<input type="submit" >
 	 </form>
<?php
}
else{
?>
	<h3>Mais esperados: </h3>



<?php
}
?>
</main>
<footer class="footer">
	<p><strong> <a href="#">SOBRE</a> <span>Autores: Juan Victor e Ana Beatriz</span> 2017 </strong></p>
</footer>
</body>
</html>