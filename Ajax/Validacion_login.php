<?php

//DECLARACION DE VARIBALES
$myusername =$_GET['username'];
$mypassword = $_GET['pw']; 
$ErrorLogin="";


//VALIDACION PARA COMPROBAR SI EL USUARIO Y PW ES IGUAL A LO QUE INGRESO EL USUARIO.
if($myusername=="prueba" AND $mypassword=="12345"){

  session_start();

  //*******VARIABLES DE SESSION PARA USARLA EN CUALQUIER PARTE*******
  $_SESSION['usuario'] = $myusername;
  $_SESSION['password'] =$mypassword;
  $_SESSION['NOMBRE'] ="Usuario de pruebas";
  
  //ENVIO UN MJS DE SUCCESS
  echo $ErrorLogin='1';


}else{
 
 //ENVIO UN MJS DE ERROR
 echo $ErrorLogin="0";
}


?>