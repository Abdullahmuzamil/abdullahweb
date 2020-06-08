<?php

$conn=mysqli_connect("localhost","root","","toyota_db");

if(!$conn)
{
	die("some problem occured while connecting to database..." . mysql_connect_error());
}


?>