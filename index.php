<?php
require('controllers/challenge.php');

if(isset($_GET['challenge'])){
switch($_GET['challenge']){
    case 1:
    $title="Ejercicio 1";
    $content="Deberás sumar dos valores según parametros \$a y \$b";
    $example="Ejemplo: \$a+\$b";
    $test1=3;
    $test2=3;
    $test3=3;
    break;

    case 2:
    $title="Ejercicio 2";
    $content="Deberás mostrar dos valores según parametros \$a y \$b";
    $example="Ejemplo: return \$a";
    $test1=1;
    $test2=1;
    $test3=1;
    break;

    case 3:
    $title="Ejercicio 3";
    $content="Deberás restar dos valores según parametros \$a y \$b";
    $example="Ejemplo: \$a-\$b";
    $test1=-1;
    $test2=-1;
    $test3=-1;
    break;

    case 4:
    $title="Ejercicio 4";
    $content="Deberás multiplicar dos valores según parametros \$a y \$b";
    $example="Ejemplo: \$a*\$b";
    $test1=2;
    $test2=2;
    $test3=2;
    break;

    case 5:
    $title="Ejercicio 5";
    $content="Deberás dividir dos valores según parametros \$a y \$b";
    $example="Ejemplo: \$a/\$b";
    $test1=0.5;
    $test2=0.5;
    $test3=0.5;
    break;

    default:
    $title="Ejercicio 1";
    $content="Deberás sumar dos valores según parametros \$a y \$b";
    $example="Ejemplo: \$a+\$b";
    $test1=3;
    $test2=3;
    $test3=3;
    break;

}
}else{
    $title="Ejercicio 1";
    $content="Deberás sumar dos valores según parametros \$a y \$b";
    $example="Ejemplo: \$a+\$b";
    $test1=3;
    $test2=3;
    $test3=3;
}


$challenge = new Challenge();
$challenge->insertheader(); 
$challenge->insertchallenge($title,$content,$example,$test1,$test2,$test3); 
$challenge->insertfooter(); 

?>