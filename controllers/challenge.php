<?php
    include_once 'models/dbClass.php';
    include_once 'models/modules/challenges.php';

class Challenge {

function insertheader(){
    if(!isset($_SESSION['idUsuario'])){
        header('Location: login.php');
    }
    $dbclass = new DBClass();
    $connection = $dbclass->getConnection();
    $challenge = new Challenge_model($connection);
    $retos = $challenge->leerRetos();
    include('views/header.php');
}

function insertchallenge($idReto){
    $idReto=$idReto;
    $dbclass = new DBClass();
    $connection = $dbclass->getConnection();
    $title="Reto";
    $challenge = new Challenge_model($connection);
    $reto = $challenge->leerReto($idReto);
    $reto = $reto->fetch(PDO::FETCH_ASSOC);
    if($reto){
        $pruebas = $challenge->leerPruebas($idReto);
        $pruebas = $pruebas->fetchAll(PDO::FETCH_ASSOC);
        $content=$reto['descripcionReto'];
        $example=$reto['ejemplo'];
        $test1=$pruebas[0]['input'];
        $test2=$pruebas[1]['input'];
        $test3=$pruebas[2]['input'];
        $output1=$pruebas[0]['output'];
        $output2=$pruebas[1]['output'];
        $output3=$pruebas[2]['output'];
        $idPrueba1=$pruebas[0]['idPrueba'];
        $idPrueba2=$pruebas[1]['idPrueba'];
        $idPrueba3=$pruebas[2]['idPrueba'];
    }

    include('views/challenge.php');
}

function insertfooter(){
    require('views/footer.php');
}

}



?>