<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>

<body>
    <!-- include db for connection -->
    <?php
    include 'db.php';
    ?>

    <form action="admin.php" method="POST" onsubmit="return validate()">
        <p>
            <label for="admin_username">Admin Username</label>
            <input type="text" name="admin_username">
        </p>

        <p>
            <label for="admin_password">Admin Password</label>
            <input type="password" name="admin_password">
        </p>
        <input type="submit" name="submit" value="Login" />
    </form>
</body>

</html>