<?php
    include_once 'models/dbClass.php';
    include_once 'models/modules/challenges.php';


    $dbclass = new DBClass();
    $connection = $dbclass->getConnection();
    $pruebas = new Challenge_model($connection);
    $data['idReto'] = $_POST['idReto'];
    $data['idPrueba']=$_POST['idPrueba'];
    $valores = $pruebas->leerPrueba($data['idPrueba']);
    $valores= $valores->fetch(PDO::FETCH_ASSOC);
    eval(str_replace(["<?php","?>"],"",$_POST["code"]));
    $func=substr($_POST['code'],14,strpos($_POST['code'],"(")-14);
    $input=explode(",", $valores['input']);
    $data['output']=call_user_func_array($func,$input);
    $verificar = $pruebas->verificarPrueba($data);
    $count = $verificar->rowCount();
if($count>0){
    echo "1";
}else{
    echo "0";
}

?>