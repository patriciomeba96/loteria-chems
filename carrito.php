<?php 
	session_start();
	include 'conectar.php';
    $rep=0;
	if(isset($_GET['accion'])){
		switch (($_GET['accion'])) {
			case "agregar":
				if(isset($_POST['cantidad'])){
					if(isset($_GET['idchida'])){

						$idArt = mysqli_real_escape_string($con, $_GET['idchida']);

						$sql="SELECT * FROM articulo where idArt = $idArt";

						$resultado=mysqli_query($con, $sql);

						$articulo=mysqli_fetch_assoc($resultado);

						mysqli_free_result($resultado);

						mysqli_close($con);
						//*******
                        
                        
						$articulo['cantidad'] = $_POST['cantidad'];
					//	$articulo['precio'] = $_POST['precio'];

						if(!isset($_SESSION['alv'])){
							$_SESSION['alv']=array();
							array_push($_SESSION['alv'], $articulo);
							//print_r($_SESSION['alv']);
						}else{					
                            
                            foreach($_SESSION['alv'] as $indice=>$item) {
                                if($articulo['idArt'] == $item['idArt'] ){
                                    $rep++;
                                    $borrar=$indice;
                                    $borrarcan=$item['cantidad'];
                                }
                            }
                             if($rep==1){
                                 unset($_SESSION['alv'][$borrar]);
                                 $articulo['cantidad']+=$borrarcan;
                                 array_push($_SESSION['alv'], $articulo);
                                 
                             }else{
                                 array_push($_SESSION['alv'], $articulo);
                             }    
                            
                            print_r($_SESSION['alv']);
                        }
					}
				}
				break;
			case "remover":
				if(isset($_SESSION['alv'])){
					foreach($_SESSION['alv'] as $indice=>$elemento){
						if($_GET['idchida'] == $elemento['idArt']){
							unset($_SESSION['alv'][$indice]);
						}
						if(empty($_SESSION['alv'])){
							unset($_SESSION['alv']);
						}
					}
				}
				break;
			case "vaciar":
				unset($_SESSION['alv']);
				break;
		}
	}

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
    <link rel="stylesheet" href="styles/Carrito_style.css">


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
                    <li><a href= <?php echo ("acercade.php?idmandar=".$id) ?> class="smoothScroll">Acerca de</a></li>
                    <li><a href=<?php echo ("Productos-index.php?idmandar=".$id)?> class="smoothScroll"> Tienda</a></li>
                    <li><a href="inicio.html" class="smoothScroll">Cerrar Sesion</a></li>
                </ul>
            </div>
        </div>
    </div>


    <!-- HOME -->
    <section id="home" class="parallax-section">
        <!--  <div class="overlay"></div> -->

        


<div class="containercenter">

    	<h1 id="carrini">Carrito</h1>

    	<a class="btn brand z-depth-0" href=<?php echo ("carrito.php?accion=vaciar&idmandar=".$id)?>>Vaciar Carrito</a>

    	<?php if(isset($_SESSION['alv'])){
    		$cant_total=0;
    		$precio_total=0;
    	?>
<div id="contener">
       
    	<table class="stripped">
    		<tbody>
    			<tr>
    				<th id="arriba">Tirulo</th>
    				<th id="arriba">Id</th>
    				<th id="arriba">Cantidad</th>
    				<th id="arriba">Precio Unitrio</th>
    				<th id="arriba">Total</th>
    				<th id="arriba">Remover</th>
    			</tr>
    			<?php 
    				foreach($_SESSION['alv'] as $item){
    					$precio_item=$item['cantidad']*$item['precio'];
    			?>
    			<tr>
    				<td id="abajo"><?php echo $item['nombre']; ?></td>
    				<td id="abajo"><?php echo $item['idArt']; ?></td>
    				<td id="abajo"><?php echo $item['cantidad']; ?></td>
    				<td id="abajo"><?php echo '$'.$item['precio']; ?></td>
    				<td id="abajo"><?php echo "$".number_format($precio_item,2); ?></td>
    				<td id="abajo"><a class=" btn brand z-depth-0" href="carrito.php?accion=remover&idmandar=<?php echo($id)?>&idchida=<?php echo($item['idArt']) ?>">  <img src="img/icon-delete.png" alt="Remover"></a></td>
    				
    			</tr>
    			<?php 
    				$cant_total+=$item['cantidad'];
    				$precio_total+=$precio_item;
    			}
    			?>


    			<tr>
    				<td id="total" >Total</td>
    				<td id="total"></td>
    				<td id="total"><?php echo $cant_total; ?></td>
    				<td id="total"></td>
    				<td id="total" ><?php echo "$".$precio_total ?></td>
    				<td id="total"></td>
    				
    			</tr>
    		</tbody>
    	</table>
    	
    	</div>
    <?php }else{ ?>
    	<p>Tu carrito esta vacio</p>
	<?php } ?>
	</div>
          
        

        <!-- Video -->
        <video controls autoplay loop muted>

            <source src="videos/video-negro.mp4" type="video/mp4">
        </video>

    </section>



</body>

</html>
