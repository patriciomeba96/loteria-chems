<?php




include 'conectar.php';

	

$id = $_GET['idmandar'];



	//escapar caracteres sql
	//$id = mysqli_real_escape_string($con, $_GET['id']);

	$sql="SELECT * FROM usuario WHERE idUs = $id";

	if(mysqli_query($con, $sql)){
        $resultado = mysqli_query($con, $sql);
        $usuario=mysqli_fetch_assoc($resultado);

	mysqli_free_result($resultado);

	mysqli_close($con);
    } else{
        
    }

	





?>



<!DOCTYPE html>
<html lang="en">
<head>

<title>Loteria Cheems</title>



<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link rel="stylesheet" href="css/bootstrap.min.css">




<!-- MAIN CSS -->
<link rel="stylesheet" href="css/tooplate-style.css">


</head>
<body>
<style>
    #btniniciar{
        background-color: indianred;
        color: white;
        width: 400px;
        height: 100px;
        font-size: 50px;
        border-radius: 10px;
    }
    </style>



<!-- MENU -->
<div class="navbar custom-navbar navbar-fixed-top" role="navigation">
     <div class="container">

          <!-- NAVBAR HEADER -->
         <div class="navbar-header">
               <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
               </button>
               <!-- lOGO -->
               <a href= <?php echo ("Perfil.php?idmandar=".$id) ?> class="navbar-brand"><?php echo ($usuario['nombre']); ?></a>
          </div> 

          <!-- MENU LINKS -->
          <div class="collapse navbar-collapse">
               <ul class="nav navbar-nav navbar-right">
                    <li><a href= <?php echo ("acercade.php?idmandar=".$id) ?> class="smoothScroll">Acerca de</a></li>
                    <li><a href= <?php echo ("Carrito.php?idmandar=".$id) ?> class="smoothScroll">Carrito</a></li>
                    <li><a href= <?php echo ("Productos-index.php?idmandar=".$id) ?> class="smoothScroll">Tienda</a></li>  
                    <li><a href="inicio.html" class="smoothScroll">Cerrar Sesion</a></li>
               </ul>
          </div>

     </div>
</div>


<!-- HOME -->
<section id="home" class="parallax-section">
     <div class="overlay"></div>
     <div class="container">
          <div class="row">

               <div class="col-md-8 col-sm-12">
                    <div class="home-text">
                         <h1>¡Loteria Mexicana!</h1>
                         <p>La misma experiencia pero al estilo cheems</p>
                      <!--   <ul class="section-btn">
                              <a href="#about" class="smoothScroll"><span data-hover="Discover More">Discover More</span></a>
                         </ul> -->
                    </div>
                    
                    <button id="btniniciar" onclick="<?php echo("location.href='Loteria-index.php?idmandar=$id'") ?>">Iniciar juego</button>
               </div>

          </div>
     </div>

     <!-- Video -->
     <video controls autoplay loop muted>
          <source src="videos/video-inicio.mp4" type="video/mp4">
     </video>
     
</section>



</body>
</html>