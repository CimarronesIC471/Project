<?php 
  session_start();
  $acceso = $_SESSION['acceso'];
  //if($acceso==1)
  if($acceso==1){
  
?>

<!DOCTYPE HTML>
<!--
	Forty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>UABC</title>
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
				<!-- Note: The "styleN" class below should match that of the banner element. -->
					<header id="header" class="alt style2">
						<a href="Permisos.php" class="logo"><strong>UABC</strong> </a>
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
				<!-- Note: The "styleN" class below should match that of the header element. -->
					<section id="banner" class="style2">
						<div class="inner">
							<span class="image">
								<img src="images/pic07.jpg" alt="" />
							</span>
							<header class="major">
								<h1>BIENVENIDO</h1>
							</header>
							<div class="content">
								<p></p>
							</div>
						</div>
					</section>

				<!-- Main -->
					<div id="main">

						<!-- One -->
					<?php
					   $numero=@$_POST['numero'];
					   $nombre=@$_POST['nombre'];
					   $apellido=@$_POST['apellido'];
					   $Rol=@$_POST['Rol'];
					   $correo=@$_POST['correo'];
					   $passwrd=@$_POST['passwrd'];
					   $Sub=@$_POST['Sub'];
					   if(isset($Sub)){
					   	if(trim($numero)=="" || trim($nombre)=="" || trim($apellido)=="" || trim($Rol)=="" || trim($passwrd)=="" || trim($correo)==""){
					   		print '<script language="JavaScript">';
                            print 'alert("No puedes dejar campos vacios!");';
                            print '</script>';

					   	}
					   	else{
					   		//Agregamos usuarios
					   		$conexion = mysqli_connect("www.geoconstructor.com","geoconst_admin","permisosuabc1584","geoconst_PermisosUABC");
					   		$validacion = mysqli_query($conexion,"SELECT Name, Email FROM Usuarios WHERE Name='$nombre' OR Email='$correo'");
					   		$darows = mysqli_num_rows($validacion);
                            //Si ya existe el nombre u correo en otro registro
                            if($darows>0){
                            	mysqli_close($conexion);
                            	print '<script language="JavaScript">';
                            print 'alert("El nombre u correo escritos ya pertenecen a un usuario de la base de datos.");';
                            print '</script>';

                            }
                            else{
					   		$query = mysqli_query($conexion,"INSERT INTO Usuarios (Name, UserPassword, Email, NoEmpleado, Apellido, adm, Status) VALUES ('$nombre', '$passwrd', '$correo', '$numero', '$apellido', '$Rol', 1)");
					   		mysqli_close($conexion);
					   		print '<script language="JavaScript">';
                            print 'alert("Usuario agregado!");';
                            print '</script>';
                        }
					   	}
					   }
				    ?>

						<!-- Two -->
							<section id="two" class="spotlights">
								<section>
									
								</section>
								<section>
									<a href="generic.html" class="image">
										<img src="images/pic09.jpg" alt="" data-position="top center" />
									</a>
									<div class="content">
										<div class="inner">
											<header class="major">
												<h3>AGREGAR USUARIO</h3>
                                                <section>
							     	<form method="post" action="Permisos.php">
									<div class="field half first">
										<label for="name">No. empleado</label>
										<input type="text" name="numero" id="name" />
									</div>
									<div class="field half">
										<label for="email">Nombre</label>
										<input type="text" name="nombre" id="email" />
									</div>
									<div class="field">
										<label for="email">Apellidos</label>
										<input type="text" name="apellido" id="Passwrd" />
										Roles: <br/>
										<input type="radio" name="Rol" value="0"> Usuario
										<input type="radio" name="Rol" value="1"> Administrador
										<label for="email">Correo</label>
										<input type="text" name="correo" id="passwrd" />
										<label for="email">Contraseña</label>
										<input type="text" name="passwrd" id="passwrd" />
									</div>
									
									
								
									
									<ul class="actions">
										<li><input type="submit" name="Sub" value="Ingresar" class="special" /></li>
										
									</ul>
								</form>
							</section>
											
											
										</div>
									</div>
								</section>
								<section>
									<a href="generic.html" class="image">
										<img src="images/pic10.jpg" alt="" data-position="25% 25%" />
									</a>
									<div class="content">
										<div class="inner">
											<header class="major">
												<h3>ELIMINAR USUARIO</h3>
											</header>
											<p>Nullam et orci eu lorem consequat tincidunt vivamus et sagittis magna sed nunc rhoncus condimentum sem. In efficitur ligula tate urna. Maecenas massa sed magna lacinia magna pellentesque lorem ipsum dolor. Nullam et orci eu lorem consequat tincidunt. Vivamus et sagittis tempus.</p>
											<ul class="actions">
												<li><a href="generic.html" class="button">Learn more</a></li>
											</ul>
										</div>
									</div>
								</section>
								<section>
									<a href="generic.html" class="image">
										<img src="images/pic08.jpg" alt="" data-position="center center" />
									</a>
									<div class="content">
										<div class="inner">
											<header class="major">
												<h3>MODIFICAR USUARIO</h3>
											</header>
											<p>Nullam et orci eu lorem consequat tincidunt vivamus et sagittis magna sed nunc rhoncus condimentum sem. In efficitur ligula tate urna. Maecenas massa sed magna lacinia magna pellentesque lorem ipsum dolor. Nullam et orci eu lorem consequat tincidunt. Vivamus et sagittis tempus.</p>
											<ul class="actions">
												<li><a href="generic.html" class="button">Learn more</a></li>
											</ul>
										</div>
									</div>
								</section>
							</section>

					

					</div>

				<!-- Contact -->
					<section id="contact">
						<div class="inner">
							<section>
								<form method="post" action="#">
									<div class="field half first">
										<label for="name">Name</label>
										<input type="text" name="name" id="name" />
									</div>
									<div class="field half">
										<label for="email">Email</label>
										<input type="text" name="email" id="email" />
									</div>
									<div class="field">
										<label for="message">Message</label>
										<textarea name="message" id="message" rows="6"></textarea>
									</div>
									<ul class="actions">
										<li><input type="submit" value="Send Message" class="special" /></li>
										<li><input type="reset" value="Clear" /></li>
									</ul>
								</form>
							</section>
						
							</section>
						</div>
					</section>

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
						
						</div>
					</footer>

			</div>
			<?php
		}
		if($acceso!=1){
			//header('Location: index.php');
		}
		
		?>

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