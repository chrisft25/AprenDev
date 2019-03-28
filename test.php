<?php

//$codigo= $_POST["code"]; //Recibimos el código escrito por el usuario
//$nombre= "codigo1.php"; //Generamos un nombre para el archivo
//$archivo= fopen($nombre,"w");
//fwrite($archivo, $codigo);
//fclose($archivo);
//include($nombre);
eval(str_replace(["<?php","?>"],"",$_POST["code"]));
echo suma(1,2);

?>