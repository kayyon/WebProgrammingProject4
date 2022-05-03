<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css" />
    <title>Login Properties</title>
</head>

<body>
    <form action="home.php">
        <input type="submit" name="home" value="Home" />
    </form>
    <!-- include db for connection -->
    <?php
    include 'db.php';

    // if (isset($_SESSION['register_username'])) {
    //     echo $_SESSION['register_message'];
    // }

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // sql query for password and buyer/seller
        $sql_retrieve = "SELECT * FROM user WHERE username='$username';";
        $sql_query = mysqli_query($mysqli, $sql_retrieve); // array object
        $retrieved_data = mysqli_fetch_assoc($sql_query); // parses array

        // hash verify
        $valid = password_verify($password, $retrieved_data["password"]);

        if ($valid) {
            // if password needs rehash, it will rehash the password
            if (password_needs_rehash($retrieved_data["password"], PASSWORD_DEFAULT)) {
                $retrieved_data["password"] = password_hash($password, PASSWORD_DEFAULT);
            }


            // saves user_id and username as session variables
            $_SESSION["user_id"] = $retrieved_data["user_id"];
            $_SESSION["username"] = $username;

            // checks if user is buyer or seller and redirects user to proper dashboard
            if ($retrieved_data["buyerSeller"] == 0) {
                $_SESSION['buyer'] = "buyer";
                $_SESSION['details'] = "details";
                $_SESSION["search"] = "search";
                header("Location: buyer.php");
                exit();
            } else {
                $_SESSION['seller'] = "seller";
                $_SESSION['details'] = "details";
                $_SESSION['delete'] = "delete";
                header("Location: seller.php");
                exit();
            }
        } else if ($username == "admin") {
            // sql query for admin
            $sql_admin = "SELECT adminPassword FROM admin WHERE adminUsername='$username';";
            $sql_admin_query = mysqli_query($mysqli, $sql_admin);
            $retrieved_admin = mysqli_fetch_assoc($sql_admin_query);

            if ($retrieved_admin["adminPassword"] == $password) {
                $_SESSION['admin'] = "yes";
                $_SESSION['details'] = "details";
                $_SESSION['delete'] = "delete";
                $_SESSION["search"] = "search";
                header("Location: admin.php");
                exit();
            } else {
                echo "Error: invalid entry";
            }
        } else {
            echo "Error: Please check username or password";
        }
    }

    $mysqli->close();
    ?>

    <form action="login.php" method="POST" onsubmit="return validate()">
        <p>
            <label for="username">Username</label>
            <input type="text" name="username" required>
        </p>

        <p>
            <label for="password">Password</label>
            <input type="password" name="password" required>
        </p>
        <input type="submit" name="submit" value="Login" />
    </form>
</body>

</html>