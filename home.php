<?php
include 'db.php';
session_start();

if ($_SESSION['buyer']) {
    header("Location: buyer.php");
    exit();
} else if ($_SESSION['seller']) {
    header("Location: seller.php");
    exit();
} else if ($_SESSION['admin']) {
    header("Location: admin.php");
    exit();
} else {
    header("Location: homepage.html");
}
