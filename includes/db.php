<?php ob_start(); ?>

<?php

$conn = mysqli_connect('127.0.0.1', 'root', '', 'cms');
if(!$conn){
    echo "Connection error!". mysqli_connect_error();
}