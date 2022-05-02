<!DOCTYPE html>
<?php
session_start();
if (empty($_SESSION['logged_in'])) {
    header('Location: login.php');
    exit;
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin View</title>
</head>

<body>
    <!-- WORK IN PROGRESS -->
    <!-- TODO: buyer table, seller table, properties table -->
    <!-- TODO: delete user, delete properties -->
    <?php
    include 'db.php';

    $sql_query = "SELECT * FROM properties;";
    $result = $mysqli->query($sql_query);



    echo "<h3>Properties</h3>";
    $row = mysqli_fetch_assoc($result);
    echo "<div><p>";
    echo "<img src = \"photos/" . $row["image"] . "\"><br/>";
    echo "Property Value: " . $row["propertyValue"] . "<br/>";
    echo "location: " . $row["location"] . "<br/>";
    echo "age: " . $row["age"] . "<br/>";
    echo "bedroomNum: " . $row["bedroomNum"] . "<br/>";
    echo "bathroomNum: " . $row["bathroomNum"] . "<br/>";
    echo "garden: " . $row["garden"] . "<br/>";
    echo "parkingAvailability: " . $row["parkingAvailability"] . "<br/>";
    echo "nearbyFacilities: " . $row["nearbyFacilities"] . "<br/>";
    echo "mainRoads: " . $row["mainRoads"] . "<br/>";
    echo "propertyTax: " . $row["propertyTax"] . "<br/>";
    echo "</div></p>";
    ?>


</body>

</html>