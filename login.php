<!-- destroy session variables -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Properties</title>
</head>

<body>
    <!-- include db for connection -->
    <?php
    include 'db.php';
    ?>

    <!-- WORK IN PROGRESS -->
    <?php
    if (isset($_SESSION['username'])) {
        echo $_SESSION['register_message'];
    }

    if (isset($_POST['submit'])) {
        $_SESSION['username'] = $_POST['username'];
        header("Location: index.php");
        exit();
    }

    $mysqli->close();
    ?>

    <form action="index.php" method="POST" onsubmit="return validate()">
        <p>
            <label for="username">Username</label>
            <input type="text" name="username">
        </p>

        <p>
            <label for="password">Password</label>
            <input type="password" name="password">
        </p>
        <input type="submit" name="submit" value="Login" />
    </form>
</body>

</html>