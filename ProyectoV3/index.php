<?php

session_start();
$_SESSION['acceso']=0;
?>

<!DOCTYPE HTML>
<!--
	Forty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<html>
	<head>
		<title>Sistema de Permisos UABC</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<a href="index.php" class="logo"><strong>UABC</strong> <span></span></a>
						<nav>
							<a href="#menu">Menu</a>
						</nav>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<ul class="links">
							<li><a href="index.html">Home</a></li>
							<li><a href="landing.html">Landing</a></li>
							<li><a href="generic.html">Generic</a></li>
							<li><a href="elements.html">Elements</a></li>
						</ul>
						<ul class="actions vertical">
							<li><a href="#" class="button special fit">Get Started</a></li>
							<li><a href="#" class="button fit">Log In</a></li>
						</ul>
					</nav>

				<!-- Banner -->
					<section id="banner" class="major">
						<div class="inner">
							<header class="major">
								<h1>Sistema de permisos UABC</h1>
							</header>
							
						</div>
					</section>

				<!-- Main -->
				
                <?php

                 $Correo = @$_POST['Correo'];
                 $Passwrd = @$_POST['Passwrd'];
                 $Sub = @$_POST['Sub'];
                 
                
                 if(!$Correo || !$Passwrd){
                 	 if(isset($Sub) && ((trim($Correo)=="") || (trim($Passwrd)==""))){
				       echo '<div class="centrado"> No puedes dejar espacios en blanco! </div> ';
				       }

                 

                ?>
				<!-- Contact -->
					<section id="contact">
						<div class="inner">
							<section>
								<form method="post" action="index.php">
									<div class="field">
										<label for="name">Correo</label>
										<input type="text" name="Correo" id="Correo" />
									</div>
									<div class="field">
										<label for="email">Contraseña</label>
										<input type="text" name="Passwrd" id="Passwrd" />
									</div>
									
									<input type="checkbox" name="recordar" value="1"> Recordar contraseña 



									<label> <a href='recuperar.php'>Recuperar contraseña </a> </label>
									
									<ul class="actions">
										<li><input type="submit" name="Sub" value="Ingresar" class="special" /></li>
										
									</ul>
								</form>
							</section>

						
						</div>
					</section>
					<?php
				       }
				       
				       	
				       else{
				       
				       


				       //Meodo para revisar si el usuario es Administrador y Usuario a la vez
				       $revisar = mysqli_connect("www.geoconstructor.com","geoconst_admin","permisosuabc1584","geoconst_PermisosUABC");
				       $quer = mysqli_query($revisar,"SELECT adm FROM Usuarios WHERE Email= '".$Correo."' AND UserPassword= '".$Passwrd."' ");
				       $array = mysqli_fetch_array($quer);
                       $dato =$array['adm'];

				       if($dato==0){
				       	echo '<div class="centrado"> Datos incorrectos </div> ';
    				     ?>
    				     	<section id="contact">
						<div class="inner">
							<section>
								<form method="post" action="index.php">
									<div class="field">
										<label for="name">Correo</label>
										<input type="text" name="Correo" id="Correo" />
									</div>
									<div class="field">
										<label for="email">Contraseña</label>
										<input type="text" name="Passwrd" id="Passwrd" />
									</div>
									
									<input type="checkbox" name="recordar[]" value="recordar"> Recordar contraseña 



									<label> <a href='recuperar.php'>Recuperar contraseña </a> </label>
									
									<ul class="actions">
										<li><input type="submit" name="Sub" value="Ingresar" class="special" /></li>
										
									</ul>
								</form>
							</section>

						
						</div>
					</section>
                     <?php 
                     }

				       else{
				       	 
				       	$_SESSION['acceso']=1;


					?>
					<section id="contact">
						<div class="inner">
							<section>
								<form method="post" action="entrar.php">
									<div class="Centrado">
					                <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Profesor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Administrador<h2>					         
					                </div>
									<ul class="actions">

										<li><input type="submit" value="Aceptar" name="Maestro" class="special" /></li>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<li><input type="submit" value="Aceptar" name="Administrador" class="special" /></li>
										
									</ul>
								</form>
							</section>

						
						</div>
					</section>

					<?php
				      }
				  }
				  
               
				      ?>


				<!-- Footer -->
				

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>