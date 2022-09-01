<?php

$servername = 'localhost';
$username = 'u632986454_HashCoffee';
$password = '*PRZbX7w';
$dbname = 'u632986454_DB';
$conn=new mysqli($servername ,$username ,$password ,$dbname);

if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

session_start(); 
