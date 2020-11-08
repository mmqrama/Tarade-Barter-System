<?php
$servername = "localhost";
$username = "root";
$pwd = "";
$dbName = "useraccounts";

$conn = mysqli_connect($servername, $username, $pwd, $dbName);

if(!$conn){
die("Connection failed: " . mysqli_connect_error());
}