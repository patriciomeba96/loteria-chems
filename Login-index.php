<?php
	include 'conectar.php';

	
    

    if (isset($_POST['entra'])) {
        
      $usuario = $_POST['nombre'];
      $contra = $_POST['pass'];
          
        //  echo "Llegue ". $usuario. $contra;
        $ussql = "Select * from usuario where (nameTag = '$usuario' and contrasena = '$contra')" ;
        
        $local_us = (mysqli_query($con, $ussql));
        
    if($local_us){
        while($row = $local_us ->fetch_array()){
            $id = $row['idUs'];
        }
        //echo("la id es:" .$id); 
        header('Location: inicio_us.php?idmandar='.$id);//Esta id hay que mandarla a las paginas
    }else{
       echo "No hay";
       // header('Location: Login-index.php');
       //Aqui va una alerta de datos incorrectos
    }
        
        
        
     
        
          
    }
else {
    
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
    <link rel="stylesheet" href="styles/log_in-style.css">


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
                    <li><a href="Registro-index.php" class="smoothScroll"> Registrarse</a></li>
                   
                </ul>
            </div>

        </div>
    </div>


    <!-- HOME -->
    <section id="home" class="parallax-section">
        <!--  <div class="overlay"></div> -->

        <section class="campos">

            <form action="login-index.php" method="post">
                <div class="form-group">
                    <label for="nombre">
                        <h1>Nombre de Usuario</h1>
                    </label>
                    <input type="text" name="nombre" id="nombre" placeholder="Ingresa tu nombre" class="form-control" required>

                </div>
                <div class="form-group">
                    <label for="pass">
                        <h1>Contraseña de Usuario</h1>
                    </label>
                    <input type="password" name="pass" id="pass" placeholder="Ingresa contraseña" class="form-control" required minlength="3">


                </div>

                <input type="submit" name="entra" value="Ingresar" class="btn btn-primary" id="Ingresar">
            </form>

        </section>

        <!-- Video -->
        <video controls autoplay loop muted>

            <source src="videos/video-sesion.mp4" type="video/mp4">
        </video>

    </section>



</body>

</html>
