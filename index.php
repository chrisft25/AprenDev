<?php
session_start();
require('controllers/challenge.php');
require('controllers/users.php');

$challenge = new Challenge();
$user = new User();
$challenge->insertheader(); 

if(!isset($_GET['action'])){
    $_GET['action'] = 'challenge';
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