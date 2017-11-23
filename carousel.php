<!DOCTYPE html>
<html>
<head>
  <title>carousel</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="./slick/slick.css">
  <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">
  <style type="text/css">

    
  </style>
  <meta name="viewport" content="width=device-width, user-scalable=no"/>
  <link rel="stylesheet" type="text/css" href="./css/corpo.css"/>
   <link rel="stylesheet" type="text/css" href="./css/home_conteudo.css"/>
  <script type="text/javascript" src="./js/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" media="(max-width: 769px)" href="./css/Rcorpo.css"/>
  <script type="text/javascript">
    $(function(){
      $("button").click(function(){
        $(".usus").fadeIn("fast");
      });
      $("button").blur(function(){
        $(".usus").fadeOut("slow");
      });

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
    <li><h4><a href="#esperados" class="as">Mais Esperados</a></h4></li>
    <li><h4><a href="#lancamentos" class="as">Lançamentos</a></h4></li>
    <li><h4><a href="#bilheteria" class="as">Maior Bilheteria</a></h4></li>
    <li><h4><a href="#series" class="as">Séries</a></h4></li>
  </div>  
  
    <a href="#"><button class="usu">
    <li class="gatilho_logout">
    <img id="usuario" src=
    <?php 
      if(!file_exists('./foto_usuario/'.$id)){
        echo '"./foto_usuario/anonimo.jpeg"';
      }
      else{
        echo '"./foto_usuario/'.$id.'/'.$nome_perfil.'"';
      }
    ?>
    />
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
  <form id="form" method="POST" action="carousel.php" enctype="multipart/form-data" style="margin-left: 26vw">
      <input type="file" name="perfil" value="perfil">
      <input type="submit" >
   </form>
<?php
}
else{
?>
  <p class="titulo" id="esperados">Mais esperados: </p>
  <section class="regular slider" id="primeiro" >
    <div>
      <a href="jl.php">
        <figure>
          <img src="./img/jl.jpeg" class="imgs">
          <figcaption>Justice League</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="sw.php">
        <figure>
          <img src="./img/wars.jpeg" class="imgs">
          <figcaption>Star Wars: Episode XVIII</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="tr.php">
        <figure>
          <img src="./img/thor.jpeg" class="imgs">
          <figcaption>Thor Ragnarok</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="de.php">
        <figure>
          <img src="./img/de.jpg" class="imgs">
          <figcaption>Doutor Estranho</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="ha.php">
        <figure>
          <img src="./img/ha.jpg" class="imgs">
          <figcaption>Homem Aranha Homecoming</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="vf.php">
        <figure>
          <img src="./img/vf.jpg" class="imgs">
          <figcaption>Fast and Furious 8</figcaption>
        </figure>
      </a>    
    </div>
  </section>


    <section class="vertical-center slider" id="mobile">
     <div>
      <a href="jl.php">
        <figure>
          <img src="./img/jl.jpeg" class="imgs">
          <figcaption>Justice League</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="sw.php">
        <figure>
          <img src="./img/wars.jpeg" class="imgs">
          <figcaption>Star Wars: Episode XVIII</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="tr.php">
        <figure>
          <img src="./img/thor.jpeg" class="imgs">
          <figcaption>Thor Ragnarok</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="de.php">
        <figure>
          <img src="./img/de.jpg" class="imgs">
          <figcaption>Doutor Estranho</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="ha.php">
        <figure>
          <img src="./img/ha.jpg" class="imgs">
          <figcaption>Homem Aranha Homecoming</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="vf.php">
        <figure>
          <img src="./img/vf.jpg" class="imgs">
          <figcaption>Fast and Furious 8</figcaption>
        </figure>
      </a>    
    </div>
  </section>



  <p class="titulo2">Lançamentos: </p>
  <section class="regular slider" id="primeiro">
    <div>
      <a href="gg.php">
        <figure>
          <img src="./img/gg.jpeg" class="imgs">
          <figcaption>Guardiões da Galáxia 2</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="lg.php">
        <figure>
          <img src="./img/logan.jpeg" class="imgs">
          <figcaption>Logan</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="cb.php">
        <figure>
          <img src="./img/cabana.jpeg" class="imgs">
          <figcaption>A Cabana</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="mm.php">
        <figure>
          <img src="./img/mm.jpg" class="imgs">
          <figcaption>Mulher Maravilha</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="es.php">
        <figure>
          <img src="./img/es.jpg" class="imgs">
          <figcaption>Esquadrão Suicida</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="dn.php">
        <figure>
          <img src="./img/dn.jpg" class="imgs">
          <figcaption>Deus não está Morto 2</figcaption>
        </figure>
      </a>    
    </div>
  </section>

  <section class="vertical-center slider" id="mobile">
        <div>
      <a href="gg.php">
        <figure>
          <img src="./img/gg.jpeg" class="imgs">
          <figcaption>Guardiões da Galáxia 2</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="lg.php">
        <figure>
          <img src="./img/logan.jpeg" class="imgs">
          <figcaption>Logan</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="cb.php">
        <figure>
          <img src="./img/cabana.jpeg" class="imgs">
          <figcaption>A Cabana</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="mm.php">
        <figure>
          <img src="./img/mm.jpg" class="imgs">
          <figcaption>Mulher Maravilha</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="es.php">
        <figure>
          <img src="./img/es.jpg" class="imgs">
          <figcaption>Esquadrão Suicida</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="dn.php">
        <figure>
          <img src="./img/dn.jpg" class="imgs">
          <figcaption>Deus não está Morto 2</figcaption>
        </figure>
      </a>    
    </div>
  </section>



  <p class="titulo2">Maior Bilheteria: </p>
  <section class="regular slider" id="primeiro">
    <div>
      <a href="av.php">
        <figure>
          <img src="./img/avatar.jpeg" class="imgs">
          <figcaption>Avatar</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="ti.php">
        <figure>
          <img src="./img/titanic.jpeg" class="imgs">
          <figcaption>Titanic</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="od.php">
        <figure>
          <img src="./img/star.jpeg" class="imgs">
          <figcaption>Star Wars: O Despertar da Força</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="vg.php">
        <figure>
          <img src="./img/av.jpg" class="imgs">
          <figcaption>Avengers</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="pn.php">
        <figure>
          <img src="./img/pn.jpg" class="imgs">
          <figcaption>Procurando Nemo</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="ca.php">
        <figure>
          <img src="./img/ca.jpg" class="imgs">
          <figcaption>Capitão América: Guerra Civil</figcaption>
        </figure>
      </a>    
    </div>
  </section>


  <section class="vertical-center slider" id="mobile">
     <div>
      <a href="av.php">
        <figure>
          <img src="./img/avatar.jpeg" class="imgs">
          <figcaption>Avatar</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="ti.php">
        <figure>
          <img src="./img/titanic.jpeg" class="imgs">
          <figcaption>Titanic</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="od.php">
        <figure>
          <img src="./img/star.jpeg" class="imgs">
          <figcaption>Star Wars: O Despertar da Força</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="vg.php">
        <figure>
          <img src="./img/av.jpg" class="imgs">
          <figcaption>Avengers</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="pn.php">
        <figure>
          <img src="./img/pn.jpg" class="imgs">
          <figcaption>Procurando Nemo</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="ca.php">
        <figure>
          <img src="./img/ca.jpg" class="imgs">
          <figcaption>Capitão América: Guerra Civil</figcaption>
        </figure>
      </a>    
    </div>
  </section>




   <p class="titulo2">Séries: </p>
   <section class="regular slider" id="primeiro">
    <div>
      <a href="13.php">
        <figure>
          <img src="./img/13rw.jpeg" class="imgs">
          <figcaption>13 Reasons Why</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="st.php">
        <figure>
          <img src="./img/st.jpeg" class="imgs">
          <figcaption>Stranger Things</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="dm.php">
        <figure>
          <img src="./img/daredevil.jpeg" class="imgs">
          <figcaption>Daredevil</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="vi.php">
        <figure>
          <img src="./img/vi.jpg" class="imgs">
          <figcaption>Vikings</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="td.php">
        <figure>
          <img src="./img/td.jpg" class="imgs">
          <figcaption>Os Defensores</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="sh.php">
        <figure>
          <img src="./img/sh.jpg" class="imgs">
          <figcaption>Sherlock</figcaption>
        </figure>
      </a>    
    </div>
  </section>


  <section class="vertical-center slider" id="mobile">
    <div>
      <a href="13.php">
        <figure>
          <img src="./img/13rw.jpeg" class="imgs">
          <figcaption>13 Reasons Why</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="st.php">
        <figure>
          <img src="./img/st.jpeg" class="imgs">
          <figcaption>Stranger Things</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="dm.php">
        <figure>
          <img src="./img/daredevil.jpeg" class="imgs">
          <figcaption>Daredevil</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="vi.php">
        <figure>
          <img src="./img/vi.jpg" class="imgs">
          <figcaption>Vikings</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="td.php">
        <figure>
          <img src="./img/td.jpg" class="imgs">
          <figcaption>Os Defensores</figcaption>
        </figure>
      </a>    
    </div>
        <div>
      <a href="sh.php">
        <figure>
          <img src="./img/sh.jpg" class="imgs">
          <figcaption>Sherlock</figcaption>
        </figure>
      </a>    
    </div>
  </section>


  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="./slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <script src="./funcoes.js"></script>

<?php
}
?>
</main>
<footer class="footer">
  <p><strong> <a href="#">SOBRE</a> <span>Autores: Juan Victor e Ana Beatriz</span> 2017 </strong></p>
</body>
</html>
