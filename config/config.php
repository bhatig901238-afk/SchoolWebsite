<?php

$host="localhost";

$user="root";

$password="";

$database="school_website";

$conn=mysqli_connect($host,$user,$password,$database);

if(!$conn){

die("Database Connection Failed");

}
?>