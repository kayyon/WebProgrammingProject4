<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Properties Registration</title>
</head>

<body>
    <!-- include db for connection -->
    <?php
    include 'db.php';

    // if html form submit
    if (isset($_POST['submit'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $buyerSeller = $_POST['buyerSeller'];

        if ($password === $confirm_password) {
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql_query = "INSERT INTO user (first_name, last_name, username, email, password, buyerSeller) VALUES ('$first_name', '$last_name', '$username', '$email', '$hashPassword', '$buyerSeller');";
            $valid = mysqli_query($mysqli, $sql_query);

            if (!$valid) {
                echo "Error: " . mysqli_error($mysqli);
            } else {
                // redirects to login
                header("Location: login.php");
                exit();
            }
        } else {
            echo "Your password does not match";
        }

        // session variables for sign up success window
        $_SESSION['register_username'] = $username;
        $_SESSION['register_message'] = "Account successfully created";
    }
    $mysqli->close();
    ?>

    <!-- posts to register.php to register account -->
    <form action="register.php" method="POST" onsubmit="return validate()">
        <p>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" required>
        </p>

        <p>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" required>
        </p>

        <p>
            <label for="username">Username</label>
            <input type="text" name="username" required>
        </p>

        <p>
            <label for="email">Email</label>
            <input type="text" name="email" required>
        </p>

        <p>
            <label for="password">Password</label>
            <input type="password" name="password" required>
        </p>

        <p>
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" required>
        </p>

        <p>
            <label for="buyerSeller">Check if seller:</label>
            <input type="hidden" name="buyerSeller" value="0">
            <input type="checkbox" name="buyerSeller" value="1">
        </p>

        <input type="submit" name="submit" value="Register" />
    </form>
</body>

</html>