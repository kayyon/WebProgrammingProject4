<?php
include 'db.php';
session_start();
session_destroy();
header("location: login.php");
echo "You have logged out!";
