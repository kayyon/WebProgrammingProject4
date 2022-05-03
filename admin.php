<!DOCTYPE html>
<?php
session_start();
if (empty($_SESSION['admin'])) {
    session_destroy();
    header('Location: login.php');
    exit;
} else {
    echo "Welcome admin";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css" />
    <title>Admin View</title>
</head>

<body>
    <form action="home.php">
        <input type="submit" name="home" value="Home" />
    </form>

    <form action="search.php">
        <input type="submit" name="search" value="Search" />
    </form>

    <form action="logout.php">
        <button type="logout">Logout</button>
    </form>

    <?php
    include 'db.php';

    $sql_query = "SELECT * FROM properties;";
    $result = $mysqli->query($sql_query);

    echo "<h3>Properties</h3>";
    if ($result->num_rows > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div>";
            echo "<img src = \"photos/" . $row["image"] . "\"><br/>";
            echo "propertyValue: " . $row["propertyValue"] . "<br/>";
            echo "location: " . $row["location"] . "<br/>";
            echo "age: " . $row["age"] . "<br/>";
            echo "bedroomNum: " . $row["bedroomNum"] . "<br/>";
            echo "bathroomNum: " . $row["bathroomNum"] . "<br/>";
            echo "garden: " . $row["garden"] . "<br/>";
            echo "parkingAvailability: " . $row["parkingAvailability"] . "<br/>";
            echo "nearbyFacilities: " . $row["nearbyFacilities"] . "<br/>";
            echo "mainRoads: " . $row["mainRoads"] . "<br/>";
            echo "propertyTax: " . $row["propertyTax"] . "<br/>";
            echo "<form action=\"details.php\" method = \"POST\">";
            echo "<input type=\"hidden\" name=\"id\" value = \"" . $row["id"] . "\">";
            echo "<input type=\"submit\" value=\"View Property\">";
            echo "</form>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }

    $sql_user = "SELECT * FROM user;";
    $result_user = $mysqli->query($sql_user);

    echo "<h3>Users</h3>";
    if ($result_user->num_rows > 0) {

        while ($row = mysqli_fetch_assoc($result_user)) {
            echo "<div>";
            echo "first_name: " . $row["first_name"] . "<br/>";
            echo "last_name: " . $row["last_name"] . "<br/>";
            echo "username: " . $row["username"] . "<br/>";
            echo "email: " . $row["email"] . "<br/>";
            echo "buyerSeller: " . $row["buyerSeller"] . "<br/>";
            echo "<form action=\"deleteuser.php\" method = \"POST\">";
            echo "<input type=\"hidden\" name=\"user_id\" value = \"" . $row["user_id"] . "\">";
            echo "<input type=\"submit\" value=\"Delete User\">";
            echo "</form>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }

    ?>
</body>

</html>