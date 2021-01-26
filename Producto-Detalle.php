<?php
include 'conectar.php';

	
$id_art = $_GET['idmandarart'];




	//escapar caracteres sql
	//$id = mysqli_real_escape_string($con, $_GET['id']);

	$sql="SELECT * FROM articulo WHERE idArt = $id_art";

	$resultado=mysqli_query($con, $sql);

	$articulo=mysqli_fetch_assoc($resultado);

	mysqli_free_result($resultado);
$id_us =  $_GET['idmandar'];

	$sql = "SELECT * FROM usuario WHERE idUs = $id_us";

	
        $id_resultado = mysqli_query($con, $sql);
        $usuario=mysqli_fetch_assoc($id_resultado);
	    mysqli_free_result($id_resultado);
        

	    mysqli_close($con);










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
    <link rel="stylesheet" href="styles/p_d_s.css">


</head>

<body>




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
                <a href= <?php echo ("Perfil.php?idmandar=".$id_us) ?> class="navbar-brand"><?php echo ($usuario['nombre']); ?></a>
            </div>

            <!-- MENU LINKS -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href=<?php echo ("inicio_us.php?idmandar=".$id_us)?> class="smoothScroll">Inicio</a></li>
                    <li><a href= <?php echo ("acercade.php?idmandar=".$id_us) ?> class="smoothScroll">Acerca de</a></li>
                    <li><a href="inicio.html" class="smoothScroll">Cerrar Sesion</a></li>
                </ul>
            </div>

        </div>
    </div>


    <!-- HOME -->
    <section id="home" class="parallax-section">
        <!--  <div class="overlay"></div> -->

        


<section id="Productos">
		<section id="Perfil">
			<div id="Perfil">
				<img src="img/Stop.png" width="50px" height="50px">
				
				<?php if($articulo):?>	
				<h2 class="datos">Articulo:</h2>
				<h4 class="datos"><?php echo $articulo['nombre']; ?></h4>
				<h2 class="datos">Precio:</h2>
				<p class="datos"><?php echo ("$".$articulo['precio']); ?></p>
				<h2 class="datos">disponibilidad:</h2>
				<p class="datos"><?php
				if($articulo['disponibilidad']){
					echo("Disponible");
				}else{
					echo("No disponible");
				}
				 ?></p>

				<h2 class="datos">Unidades:</h2>
				<p class="datos"><?php echo $articulo['unidades']; ?></p>
				
				<?php else: ?>
				<h5>No existe ese articulo</h5>
				<?php endif;?>
				
			</div>
		</section>
		<div>
			<form class="formcarrito" action="" method="post">
				<div>
					<input id="btnx" name="cantidad" type="number" min="1" value="1">
				</div>
				<br>
				<input id="btnx" type="submit" value="Agregar">
			</form>
		</div>
	</section>
          
        

        <!-- Video -->
        <video controls autoplay loop muted>

            <source src="videos/video-negro.mp4" type="video/mp4">
        </video>

    </section>



</body>

</html>
