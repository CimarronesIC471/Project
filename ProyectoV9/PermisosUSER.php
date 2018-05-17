<?php
  session_start();
  $acceso = $_SESSION['acceso'];
  //Variables que guardaron datos de la sesion para mostrar al entrar
  $numeroS =$_SESSION['NoEmpleadoid'];
  $nombreS= $_SESSION['Nameid'];
  $apellidoS= $_SESSION['Apellidoid'];
  $id=$_SESSION['ID'];
 
			

  //if($acceso==2)

  if($acceso==2 || $acceso==1){
  	//Condicion de borrar
  	 
  	if(isset($_POST['Borrar'])){
  	$revisarr = mysqli_connect("www.geoconstructor.com","geoconst_admin","permisosuabc1584","geoconst_PermisosUABC");
	$existee = mysqli_query($revisarr,"SELECT * FROM Solicitud WHERE Numero='".$id."'");
	$rows = mysqli_num_rows($existee);
	if($rows==1){
	$extractt = mysqli_fetch_array($existee);

	$eliminar = $extract['Nombre'];	
     mysqli_query($revisarr,"DELETE FROM Solicitud WHERE Nombre='$eliminar' ");
     print '<script language="JavaScript">';
     print 'alert("Solicitud eliminada");';
      print '</script>';
													
   }
   else{
   	 print '<script language="JavaScript">';
     print 'alert("No hay solicitudes que puedas cancelar!");';
      print '</script>';
   }
}
?>

<!DOCTYPE HTML>
<!--
	Forty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>SIPES Sistema de permisos UABC</title>
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
						<a href="PermisosUSER.php" class="logo"><strong>SIPES</strong> <span>Sistema de permisos de salida UABC</span></a>
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
							<li><a href="#" class="button special fit">Nuevo Permiso</a></li>
							<li><a href="#" class="button fit">Log In</a></li>
						</ul>
					</nav>


				<!-- Banner -->
					<section id="banner" class="major">
						<div class="inner">
							<span class="image">
								<img src="images/img5.jpg" alt="" />
							</span>
							<header class="major">
								<h1>BIENVENIDO</h1>
							</header>
							<div class="content">
								
								<ul class="actions">
									<?php
                                  //<p>TABLA CON NOMBRE</p>

								   echo "<table border='1'>
								   <tr>
								   <th>No. Empleado </th>
								   <th>Nombre </th>
								   <th>Apellido </th>
								   </tr>";
								   	echo"<tr>";
							        echo"<td>" . $numeroS. "</td>";
							        echo"<td>" . $nombreS. "</td>";
							        echo"<td>" . $apellidoS. "</td>";
							     	echo"</tr>";
 

								   echo "</table>";
								?>

								</ul>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<div class="derecha">
									<a href="CPermiso.php" class="button next scrolly">Nuevo Permiso</a>
								</div>
							</div>

						</div>
					</section>
					              
				<!-- Main -->
					<div id="main">
                    	<section id="two" class="spotlights">
								<section>
									<a href="generic.html" class="image">
										<img src="images/img8.jpg" alt="" data-position="center center" />
									</a>
									<div class="content">
										<div class="inner">
											<header class="major">
												<h3>SOLICITUDES PENDIENTES</h3>
											</header>
												<?php

												//Conexiones, instrucciones de tomar solicitudes si estas existen, etc.
												$revisar = mysqli_connect("www.geoconstructor.com","geoconst_admin","permisosuabc1584","geoconst_PermisosUABC");
												$existe = mysqli_query($revisar,"SELECT * FROM Solicitud WHERE Numero='".$id."'");
												$columnas = mysqli_num_rows($existe);
												$extract = mysqli_fetch_array($existe);
												//D

												
												//Datos para mostrar
												$folionumber = $extract['id_solicitud'];
												$fecha = $extract['Fecha'];
												$Evento = $extract['NombreEvento'];
												//Areglamos string de Fecha para poder usarlo
												$sub = substr($fecha, 0,4);
												$sub2= substr($fecha, 5,2);
												$sub3= substr($fecha, -2);
												//Agregamos a un nuevo string bien acomodad
												$fechafinal = $sub3.'/'.$sub2.'/'.$sub;
                                                if($columnas==1){
                                                	$_SESSION['gotone']=1;
                                                }


											if($columnas>0){
											  echo"<table border='1'>
                                                <tr> 
                                                <th>Folio</th>
                                                <th>Fecha</th> 
                                                <th>Evento</th> 
                                                </tr>";
                                                echo "<tr>";
                                                echo "<td>" .  $folionumber    ."</td>";
                                                echo "<td>" .    $fechafinal  ."</td>";
                                                echo "<td>" .    $Evento  ."</td>";
                                                echo "</tr>";

                                                echo"</table>";
                                            }
                                              

											?>
											<form action="PermisosUSER.php" method="post">
											<ul class="actions">
												<a href="VerPermiso.php" class="button">Ver informacion de solicitud</a>
												<li><input type="submit" name="Borrar" value="Cancelar Solicitud" class="button" /></li>
											</ul>
										</form>
                                                
										</div>
									</div>
								</section>
								<section>
									<a href="generic.html" class="image">
										<img src="images/img7.jpg" alt="" data-position="top center" />
									</a>
									<div class="content">
										<div class="inner">
											<header class="major">
												<h3>SOLICITUDES APROBADAS</h3>
											</header>

											<ul class="actions">
												<a href="generic.html" class="button">Ver oficio comision</a>
												<a href="generic.html" class="button">Enviar reporte</a>
											</ul>
										</div>
									</div>
								</section>
								<section>
									<a href="generic.html" class="image">
										<img src="images/img6.jpg" alt="" data-position="25% 25%" />
									</a>
									<div class="content">
										<div class="inner">
											<header class="major">
												<h3>SOLICITUDES RECHAZADAS</h3>
											</header>
											<p>Nullam et orci eu lorem consequat tincidunt vivamus et sagittis magna sed nunc rhoncus condimentum sem. In efficitur ligula tate urna. Maecenas massa sed magna lacinia magna pellentesque lorem ipsum dolor. Nullam et orci eu lorem consequat tincidunt. Vivamus et sagittis tempus.</p>
											<ul class="actions">
												<div class="centrado">
												<li><a href="generic.html" class="button">Ver Comentarios</a></li>
											</div>
											</ul>
										</div>
									</div>
								</section>
							</section>
						

				<!-- Contact -->
					

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							
							<ul class="copyright">
								<li>&copy; @SIPES</li><li> <a href="https://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</footer>

			</div>
			<?php

		}
		
		if($extract['sup']==1){
			print("KEPPO"); //Aqui programaré mañana
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