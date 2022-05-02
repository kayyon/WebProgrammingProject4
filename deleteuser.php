<!DOCTYPE html>
<?php
session_start();
if (empty($_SESSION['admin'])) {
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
    $user_id = $_POST['user_id'];
    $sql_query = "DELETE FROM user WHERE user_id = $user_id";
    mysqli_query($mysqli, $sql_query) or die(mysqli_error($conn));
    $mysqli->close();
    if ($_SESSION['admin']) {
        header("Location: admin.php");
        exit();
    } else {
        header("Location: login.php");
    }
    ?>
</body>

</html>