<?php

    include_once 'models/dbClass.php';
    include_once 'models/modules/users.php';

class User {

    function login(){

    $dbclass = new DBClass();
    $connection = $dbclass->getConnection();
    $user = new User_model($connection);
    $infoUsuario= $user->loginUsuario(['email'=> $_POST['email'], 'password' => $_POST['password']]);
    if($infoUsuario!="error"){
        session_start();
        $_SESSION['idUsuario']=$infoUsuario['idUsuario'];
        $_SESSION['nombreUsuario'] = $infoUsuario['nombreUsuario'];
        header('Location: index.php');
    }else{
        echo "Usuario y/o contraseña incorrectos";
    }

    }

    function registro(){

        $dbclass = new DBClass();
        $connection = $dbclass->getConnection();
        $user = new User_model($connection);
        $datosUsuario=[
            'email' => $_POST['email'],
            'username' => $_POST['username'],
            'nombreUsuario' => $_POST['nombreUsuario'],
            'password' => $_POST['password'],
            'expLaboral'=>$_POST['expLaboral'],
            'bioUsuario'=>$_POST['bioUsuario']
        ];
        $exito= $user->registrarUsuario($datosUsuario);
        if($exito==1){
            echo "Registrado papú";
            header('Location: login.php');
        }else{
            echo "Error al registrarse";
        }
    
        }

    function seeProfile($idUsuario){
        $dbclass = new DBClass();
        $connection = $dbclass->getConnection();
        $user = new User_model($connection);
        if(isset($_POST['idUsuario'])){
        $user->enviarAmistad(['idUsuarioP'=>$_SESSION['idUsuario'],'idUsuarioS'=>$_POST['idUsuario']]);
        }
        $datos = $user->leerUsuario($idUsuario);
        $datos= $datos->fetch();
        $amistad = $user->verificarAmistad(['idUsuarioP'=>$_SESSION['idUsuario'],'idUsuarioS'=>$datos['idUsuario']]);
        include('views/profile.php');
    }

    function seeRequests(){
        $dbclass = new DBClass();
        $connection = $dbclass->getConnection();
        $user = new User_model($connection);
        $solicitudes = $user->leerSolicitudes($_SESSION['idUsuario']);
        include('views/requests.php');
    }


}

?>