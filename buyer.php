<!DOCTYPE html>
<?php
session_start();
if (empty($_SESSION['buyer'])) {
    session_destroy();
    header('Location: login.php');
    exit;
} else {
    echo "Welcome " . $_SESSION["username"];
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

    $sql_query = "SELECT * FROM properties";
    $result = $mysqli->query($sql_query);

    echo "<h3>Properties</h3>";
    if ($result->num_rows > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div><p>";
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
            echo "<form action=\"buydetails.php\" method = \"POST\">";
            echo "<input type=\"hidden\" name=\"id\" value = \"" . $row["id"] . "\">";
            echo "<input type=\"submit\" value=\"View Property\">";
            echo "</form>";
            echo "</div></p>";
        }
    } else {
        echo "0 results";
    }
    $mysqli->close();
    ?>
</body>

</html>