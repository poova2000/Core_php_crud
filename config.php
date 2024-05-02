<?php

$hostname='localhost';
$dbuser='root';
$dbpassword='';
$dbname='core_php_crud';

$conn=mysqli_connect("$hostname","$dbuser","$dbpassword","$dbname");

if(!$conn){
    echo "you are not connected to mysql database";

}
