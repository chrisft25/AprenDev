<?php
session_start();
    include_once 'models/dbClass.php';
    include_once 'models/modules/users.php';

        $dbclass = new DBClass();
        $connection = $dbclass->getConnection();
        $user = new User_model($connection);
        $user->aceptarSolicitud($_GET['id']);
        header('Location:index.php?action=requests');
?>