<!DOCTYPE html>
<?php
session_start();
if (empty($_SESSION['buyer'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css" />
    <title>Properties</title>
</head>

<body>
    <?php
    include 'db.php';
    $id = $_POST['id'];
    $sql_query = "DELETE FROM wishlist WHERE user_id = " . $_SESSION["user_id"] . " AND id =" . $id;
    mysqli_query($mysqli, $sql_query) or die(mysqli_error($mysqli));
    $mysqli->close();
    header("Location: buyer.php");
    ?>
</body>

</html>