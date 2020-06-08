<?php

session_start();

setcookie('log', "",time()-(3600),);
session_destroy();

header('location:login.php');
?>