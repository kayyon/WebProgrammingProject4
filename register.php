<!-- load session variables -->
<?php
// session_destroy();
?>
<!DOCTYPE html>
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
    ?>

    <?php
    if (isset($_POST['submit'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password === $confirm_password) {
            $sql_query = "INSERT INTO user (first_name, last_name, username, email, password) VALUES ('$first_name', '$last_name', '$username', '$email', '$password');";
            if (mysqli_query($mysqli, $sql_query)) {
                echo "New account created successfully";
            } else {
                echo "Error: " . $sql_query . "<br>" . mysqli_error($mysqli);
            }
        } else {
            echo "Your password does not match";
        }

        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['register_message'] = "Account successfully created";

        header("Location: login.php");
        exit();
    }
    $mysqli->close();
    ?>

    <form action="register.php" method="POST" onsubmit="return validate()">
        <p>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name">
        </p>

        <p>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name">
        </p>

        <p>
            <label for="username">Username</label>
            <input type="text" name="username">
        </p>

        <p>
            <label for="email">Email</label>
            <input type="text" name="email">
        </p>

        <p>
            <label for="password">Password</label>
            <input type="password" name="password">
        </p>

        <p>
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password">
        </p>
        <input type="submit" name="submit" value="Register" />
    </form>
</body>

</html>