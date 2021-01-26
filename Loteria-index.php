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
    <link rel="stylesheet" href="styles/loteria_styles.css">
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
                <a href= <?php echo ("Perfil.php?idmandar=".$id) ?> class="navbar-brand"><?php echo ($usuario['nombre']); ?></a>
            </div>

            <!-- MENU LINKS -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href=<?php echo ("inicio_us.php?idmandar=".$id)?> class="smoothScroll">Inicio</a></li>
                    
                </ul>
            </div>

        </div>
    </div>


    <!-- HOME -->
    <section id="home" class="parallax-section">
        <!--  <div class="overlay"></div> -->
<section class="fondo">
			
			<article class="barra1">
				<article class="caja1">
						<h2>Puntuacion</h2>
						<p class="puntos">0 / 16</p>
				</article>
				<article class="caja1">
						<h2>Puntuación de Oponentes</h2>
						<p class="puntos">(PROXIMAMENTE))</p>
				</article>
			</article>
			
            <article class="barra2">
				 <article class="caja2">
					<img  id="T1" src="img/x.jpg" alt="yisus" class="imagenes" onclick="colocarFicha(1)">
					<img  id="T2" src="img/x.jpg" alt="se" class="imagenes" onclick="colocarFicha(2)">
					<img  id="T3" src="img/x.jpg" alt="la" class="imagenes" onclick="colocarFicha(3)">
					<img  id="T4" src="img/x.jpg" alt="come" class="imagenes" onclick="colocarFicha(4)">
					<img  id="T5" src="img/x.jpg" alt="doblada" class="imagenes" onclick="colocarFicha(5)">
					<img  id="T6" src="img/x.jpg" alt="x" class="imagenes" onclick="colocarFicha(6)">
					<img  id="T7" src="img/x.jpg" alt="d" class="imagenes" onclick="colocarFicha(7)">
					<img  id="T8" src="img/x.jpg" alt="yisus" class="imagenes" onclick="colocarFicha(8)">
					<img  id="T9" src="img/x.jpg" alt="yisus" class="imagenes" onclick="colocarFicha(9)">
					<img  id="T10" src="img/x.jpg" alt="yisus" class="imagenes" onclick="colocarFicha(10)">
					<img  id="T11" src="img/x.jpg" alt="yisus" class="imagenes" onclick="colocarFicha(11)">
					<img  id="T12" src="img/x.jpg" alt="yisus" class="imagenes" onclick="colocarFicha(12)">
					<img  id="T13" src="img/x.jpg" alt="yisus" class="imagenes" onclick="colocarFicha(13)">
					<img  id="T14" src="img/x.jpg" alt="yisus" class="imagenes" onclick="colocarFicha(14)">
					<img  id="T15" src="img/x.jpg" alt="yisus" class="imagenes" onclick="colocarFicha(15)">
					<img  id="T16" src="img/x.jpg" alt="yisus" class="imagenes" onclick="colocarFicha(16)">
				 </article>
			</article>
			
            <article class="barra3">
				<article class="caja3">
						<p id="tagname"><?php echo($usuario['nameTag'])?></p>
				</article>
				<article class="caja3-carta">
					<img  id="T" src="img/x.jpg" class="mazo">
				</article>
				<article class="caja3-carga">
					<div id ="barra-animada" class="apagado">
					</div>
				</article>
				<article class="caja3-boton">					
					<input type="button" style="" id="botonInicio" onclick="iniciar()" value="Iniciar">
					<input type="button" style="display:none" id="botonLoteria" onclick="loteria()" value="LOTERIA">
				</article>
			</article>
		</section>

        <!-- Video -->
        <video controls autoplay loop muted>
           
            <source src="videos/video-inicio.mp4" type="video/mp4">
        </video>

    </section>



</body>

</html>
