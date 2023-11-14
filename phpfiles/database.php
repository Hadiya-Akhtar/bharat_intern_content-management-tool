<?php
$dbhostName="localhost";
$dbUser="root";
$dbPassword="";
$dbName="bharat_intern1_register";
$conn=mysqli_connect($dbhostName, $dbUser ,$dbPassword, $dbName);
if(!$conn){
    die("something went wrong");
}