<?php

$id = $_GET['idmandar'];


include 'conectar.php';
$sql = "SELECT * FROM usuario WHERE idUs = $id";

	
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
    <link rel="stylesheet" href="styles/style-acercade.css">
    <script src="js/loteria.js" defer type="text/javascript"></script>


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
                 <a href=<?php echo ("Perfil.php?idmandar=".$id)?> class="navbar-brand"><?php echo ($usuario['nombre']); ?></a>
            </div>

            <!-- MENU LINKS -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href=<?php echo ("inicio_us.php?idmandar=".$id)?> class="smoothScroll">Inicio</a></li>
                    
                    <li><a href="inicio.html" class="smoothScroll">Cerrar Sesion</a></li>
                </ul>
            </div>

        </div>
    </div>


    <!-- HOME -->
    <section id="home" class="parallax-section">
        <!--  <div class="overlay"></div> -->
        <section id="datos">
<section id="acercade">
			<h1>Acerca de</h1>
			<article>
				La Lotería es un juego de mesa tradicional mexicano basado en el azar, consta de un mazo de 54 cartas identificadas con un nombre y número, 
				a la par se consta de un número indefinido de tablas, las cuales son compuestas por 16 cartas aleatorias.
				El modo de juego es simple, cada que se extraiga una carta del mazo, ésta es anunciada a todos los jugadores,
				al ser anunciada el jugador debe identificar dicha carta dentro de su tabla y en caso de aparecer en ella marcarla.
				El ganador del juego es quién logra llenar la tabla o la alineación que se haya especificado al inicio del juego, el ganador debe 
				gritar en señal de victoria ¡LOTERIA! para que su victoria sea aceptada.
				Las cartas de Lotería cuentan con personajes específicos dependiendo de la versión, ésta versión es una adaptación a los personajes 
				y/o objetos de la Lotería original mexicana pero adaptados con el toque sarcástico y humorístico del famoso perro de internet Cheems.
			</article>
		</section>

		<section id="contacto">
			<h1>Contactenos</h1>
			<article>
					<article class="contactos">
						<img src="img/logo.png">
						<ul>
							<li>Andrés Patricio Medina Bastida</li>
							<li>44-31-23-55-04</li>
						</ul>
					</article>
					<article class="contactos">
						<img src="img/logo.png">
						<ul>
							<li>Arturo Osiel Arrieta Rangel</li>
							<li>44-31-23-55-04</li>
						</ul>
					</article>
					<article class="contactos">
						<img src="img/logo.png">
						<ul>
							<li>Irving Alexis Vanegas Carreón</li>
							<li>44-31-23-55-04</li>
						</ul>
					</article>
					<article class="contactos">
						<img src="img/logo.png">
						<ul>
							<li>Luis Gerardo Martínez Rubio</li>
							<li>44-31-23-55-04</li>
						</ul>
					</article>
					<article class="contactos">
						<img src="img/logo.png">
						<ul>
							<li>Marco Antonio Méndez Ferreyra</li>
							<li>44-31-23-55-04</li>
						</ul>
					</article>
			</article>
			
		</section>
        </section>

        <!-- Video -->
        <video controls autoplay loop muted>
           
            <source src="videos/video-negro.mp4" type="video/mp4">
        </video>

    </section>



</body>

</html>
