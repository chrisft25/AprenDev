<?php

class Challenge {

function insertheader(){
    include('views/header.php');
}

function insertchallenge($title,$content,$example,$test1,$test2,$test3){
    include('views/challenge.php');
}

function insertfooter(){
    include('views/footer.php');
}

}



?>