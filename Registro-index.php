<?php

	include 'conectar.php';

	$correo = $nombre = $apellido = $contrasena = $nametag = '' ;
	$errores = array('correoError'=>'', 'nombreError'=>'', 'apellidoError'=>'', 'contrasenaError'=>'', 'nametag'=>'');

	if (isset($_POST['Ejecuta'])) {
        
        echo "Hola, sí llegue aqiu jis juos";

		if (empty($_POST['correo'])) {
			$errores['correoError']='El correo es requerido';
		}else{
			$correo=$_POST['correo'];

			if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
				$errores['correoError']='escribe un correo valido';
			}
		}

		if (empty($_POST['nombre'])) {
			$errores['nombreError']='escribe el nombre';
		}else{
			$nombre=$_POST['nombre'];

			if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $nombre)){
				$errores['nombreError']='El nombre no es valido';
			}
		}

		if (empty($_POST['apellido'])) {
			$errores['apellidoError']='escribe el apellido';
		}else{
			$apellido=$_POST['apellido'];

			if(!preg_match('/^([a-zA-Z\s]+)(\s*[a-zA-Z\s]*)*$/', $apellido)){
				$errores['apellidoError']='escriba un apellido valido';
			}
		}

		if (empty($_POST['nametag'])) {
			$errores['nametagError']='escribe el Usuario';
		}else{
			$nametag=$_POST['nametag'];

			
		}

		if (empty($_POST['contrasena'])) {
			$errores['contrasenaError']='escribe la contraseña';
		}else{
			$contrasena=$_POST['contrasena'];

			
		}

		/*if (!array_filter($errores)) {
			header('Location: index.php');
		}*/

		if (array_filter($errores)){
			
		}else{
			$correo=mysqli_real_escape_string($con, $_POST['correo']);
			$nombre=mysqli_real_escape_string($con, $_POST['nombre']);
			$apellido=mysqli_real_escape_string($con, $_POST['apellido']);
			$nametag=mysqli_real_escape_string($con, $_POST['nametag']);
			$contrasena=mysqli_real_escape_string($con, $_POST['contrasena']);
			
			

			$sqlii = "INSERT INTO usuario(apellido,contrasena,correo,nameTag,nombre) VALUES('$apellido','$contrasena','$correo','$nametag','$nombre')";

			if(mysqli_query($con,$sqlii)){
				header('Location: Login-index.php');
			}else{
				echo 'Error query: '.mysql_error($con);
			}
		}
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
    <link rel="stylesheet" href="styles/gistro-style.css">


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
                <a href="Inicio.php" class="navbar-brand">Loteria Cheems</a>
            </div>

            <!-- MENU LINKS -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="inicio.html" class="smoothScroll">Inicio</a></li>
                    <li><a href="Acerca%20de.php" class="smoothScroll">Acerca de</a></li>
                    
                    <li><a href="Login-index.php" class="smoothScroll">Iniciar sesion</a></li>
                </ul>
            </div>

        </div>
    </div>


    <!-- HOME -->
    <section id="home" class="parallax-section">
        <!--  <div class="overlay"></div> -->

        <section id="formulario">
			<h1>Registro de Usuario</h1>
			<p>*Campos Requeridos</p>
			<form action="Registro-index.php" method="POST">

	            <div class="form-group">
	                <label for="usuario">Nombre de Usuario*</label>
	                <input type="text" name="nametag" id="nametag" placeholder="Ingresa tu usuario" value= "<?php echo htmlspecialchars($nametag); ?>" class="form-control" required>
	            </div>
	            <div class="form-group">
	                <label for="nombre">Nombre(s)*</label><br>
	                <input type="text" name="nombre" id="nombre" placeholder="Ingresa tu nombre" value = "<?php echo htmlspecialchars($nombre); ?>" class="form-control" required>
	            </div>
	             <div class="form-group">
	                <label for="apellido">Apellido(s)*</label><br>
	                <input type="text" name="apellido" id="apellido" placeholder="Ingresa tu apellido" value="<?php echo htmlspecialchars($apellido); ?>" class="form-control" required>
	            </div>
	            <div class="form-group">
	                <label for="email">E-Mail*</label><br>
	                <input type="email" name="correo" id="correo" placeholder="alguien@example.com" value = "<?php echo htmlspecialchars($correo); ?>"class="form-control" required>
	            </div>
	            <div class="form-group">
	                <label for="pass">Contraseña*</label><br>
	                <input type="password" name="contrasena" id="contraseña" placeholder="Ingresa contraseña" value="<?php echo htmlspecialchars($contrasena); ?>" class="form-control" required minlength="3">
	            </div>
	            <div class="form-group">
	                <label for="pass">Confirmar Contraseña*</label>
	                <input type="password" name="ConfPass" id="ConfPass" placeholder="Confirmar contraseña" value = "<?php echo htmlspecialchars($contrasena); ?>"class="form-control" required minlength="3">
	            </div>
	            
	            
	            <input type="submit" name="Ejecuta" value="Ejecuta" class="btn btn-primary" id="registro">
	        </form>
    	</section>

        <!-- Video -->
        <video controls autoplay loop muted>
           
            <source src="videos/video-registro.mp4" type="video/mp4">
        </video>

    </section>



</body>

</html>
