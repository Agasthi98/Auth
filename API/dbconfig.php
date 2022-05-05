<?php

$con = new mysqli("localhost","root","","auth");

if ($con->connect_error) {
die("Connection failed: " . $con->connect_error);
}


?>