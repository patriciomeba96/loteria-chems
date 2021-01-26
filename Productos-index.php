<?php




include 'conectar.php';
	$sql='SELECT * FROM articulo ';

	$resultado=mysqli_query($con,$sql);

	$articuls=mysqli_fetch_all($resultado, MYSQLI_ASSOC);

	mysqli_free_result($resultado);

	mysqli_close($con);

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
    <link rel="stylesheet" href="styles/productos_style.css">


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
                    <li><a href=<?php echo ("carrito.php?idmandar=".$id)?> class="smoothScroll"> Carrito</a></li>
                    <li><a href="inicio.html" class="smoothScroll">Cerrar Sesion</a></li>
                </ul>
            </div>

        </div>
    </div>


    <!-- HOME -->
    <section id="home" class="parallax-section">
        <!--  <div class="overlay"></div> -->

        



            <div class="lqs">
                <div class="cards">
                    <?php foreach($articuls as $articulos): ?>
                    <div class="bloques">
                        <div class="card z-depth-0">

                            <div class="card-content center">
                                <a  id="Nombre_art" href=<?php echo ("Producto-Detalle.php?idmandarart=".$articulos['idArt']."&idmandar=".$id)?>  > <?php echo htmlspecialchars($articulos['nombre']); ?> </a>
                                <div class="datos_prod"><?php echo htmlspecialchars("$".$articulos['precio']); ?></div>
                                
                                <div class="datos_prod"><?php 
							if($articulos['disponibilidad']){
								echo htmlspecialchars("Disponible"); 
							}else{
								echo htmlspecialchars("No disponible"); 
							}
						?></div>
                                <div class="datos_prod"><?php echo htmlspecialchars($articulos['unidades']." Unidades"); ?></div>
                                <img src="img/torta.svg" class="img_prod" width="50px" height="50px">
                            </div>
                            <div class="card-action right-align">
                                <form class="formcarrito" action="carrito.php?idmandar=<?php echo ($id)?>&accion=agregar&idchida=<?php echo htmlspecialchars($articulos['idArt']); ?>" method="post">
                                   
                                   
                                    <div class="input-field col s6">
                                        <input name="cantidad" type="number" class="validate" min="1" value="1">
                                    </div>
                                    <br>
                                    <input type="submit" value="Agregar" class="btn_agregar">
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

</div>
        </div>

        

        <!-- Video -->
        <video controls autoplay loop muted>

            <source src="videos/video-negro.mp4" type="video/mp4">
        </video>

    </section>



</body>

</html>
