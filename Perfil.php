<?php

	include 'conectar.php';

	
	$id = $_GET['idmandar'];
	

	

		//escapar caracteres sql
		//$id = mysqli_real_escape_string($con, $_GET['id']);

		$sql="SELECT * FROM usuario WHERE idUs = $id";

		$resultado=mysqli_query($con, $sql);

		$usuario=mysqli_fetch_assoc($resultado);

		mysqli_free_result($resultado);

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
    <link rel="stylesheet" href="styles/Perfil_style.css">


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
                <a href= <?php echo ("Perfil.php?idmandar=".$id) ?> class="navbar-brand"><?php echo ($usuario['nombre']); ?></a>
            </div>
            
        <!-- MENU LINKS -->
            
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href=<?php echo ("inicio_us.php?idmandar=".$id)?> class="smoothScroll">Inicio</a></li>
                    <li><a href= <?php echo ("acercade.php?idmandar=".$id) ?> class="smoothScroll">Acerca de</a></li>
                    <li><a href="inicio.html" class="smoothScroll">Cerrar Sesion</a></li>
                </ul>
            </div>

        </div>
    </div>


    <!-- HOME -->
    <section id="home" class="parallax-section">
        <!--  <div class="overlay"></div> -->




        <section id="Perfil">
            <div id="Perfil">
                <img src="img/Stop.png" width="50px" height="50px">

                <?php if($usuario):?>
                <h2>Usuario:</h2>
                <h4><?php echo $usuario['nameTag']; ?></h4>
                <p>Nombre:</p>
                <p><?php echo $usuario['nombre']; ?></p>
                <p>Apellido:</p>
                <p><?php echo $usuario['apellido']; ?></p>
                <p>Correo:</p>
                <p><?php echo $usuario['correo']; ?></p>
                <p>Constraseña:</p>
                <p><?php echo $usuario['contrasena']; ?></p>
                <p>Partidas:</p>
                <p><?php echo $usuario['partidas']; ?></p>
                <?php else: ?>
                <h5>No existe ese usuario</h5>
                <?php endif;?>

            </div>
        </section>



        <!-- Video -->
        <video controls autoplay loop muted>

            <source src="videos/video-negro.mp4" type="video/mp4">
        </video>

    </section>



</body>

</html>
