<?php

$servername = '';
$username = '';
$password = '';
$dbname = '';
$conn=new mysqli($servername ,$username ,$password ,$dbname);

if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

session_start(); 
