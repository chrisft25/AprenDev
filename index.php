<?php
require('controllers/challenge.php');

if(isset($_GET['challenge'])){
$challenge = new Challenge();
$challenge->insertheader(); 
$challenge->insertchallenge($_GET['challenge']); 
$challenge->insertfooter(); 
}
?>