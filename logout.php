<?php
include 'db.php';
session_destroy();
header("location: login.php");
echo "You have logged out!";
