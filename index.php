<?php
session_start();
require('controllers/challenge.php');
require('controllers/users.php');

$challenge = new Challenge();
$user = new User();
$challenge->insertheader(); 

if(!isset($_GET['action'])){
    if(isset($_GET['user'])){
        $_GET['action']="user";
        if(strlen($_GET['user'])==0){
            $_GET['user']=$_SESSION['idUsuario'];
        }
    }else{
        $_GET['action']="challenge";
    }
}
switch($_GET['action']){
    case 'challenge':
        if(isset($_GET['challenge'])){
            $challengeID=$_GET['challenge'];
        }else{
            $challengeID=1;
        }
        $challenge->insertchallenge($challengeID);
    break;

    case 'user':
        if(isset($_GET['user'])){
            $userID=$_GET['user'];
        }else{
            $userID=$_SESSION['idUsuario'];
        }
        $user->seeProfile($userID);
    break;

    case 'requests':
    $user->seeRequests();
    break;
   default:
    if(isset($_GET['challenge'])){
        $challengeID=$_GET['challenge'];
    }else{
        $challengeID=1;
    }
    $challenge->insertchallenge($challengeID);
    break;
}
$challenge->insertfooter(); 
?>