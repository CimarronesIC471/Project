<?
  session_start();
  $acceso = $_SESSION['acceso'];

  if(($acceso==1)){
  	//header("Location : /Proyecto/Permisos.php");
    header("Location: Permisos.php");
  }


?>