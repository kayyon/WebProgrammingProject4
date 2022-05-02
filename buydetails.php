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
    <form action="home.php">
        <input type="submit" name="home" value="Home" />
    </form>
    <?php
    include 'db.php';

    $id = $_POST['id'];
    $sql_query = "SELECT * FROM properties WHERE id=" . $id;
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

    $mysqli->close();
    ?>

    <form action="wishlist.php" method="POST">
        <input type="hidden" name="image" value="<?php echo $row['image'] ?>">
        <input type="hidden" name="propertyValue" value="<?php echo $row['propertyValue'] ?>">
        <input type="hidden" name="location" value="<?php echo $row['location'] ?>">
        <input type="hidden" name="age" value="<?php echo $row['age'] ?>">
        <input type="hidden" name="bedroomNum" value="<?php echo $row['bedroomNum'] ?>">
        <input type="hidden" name="bathroomNum" value="<?php echo $row['bathroomNum'] ?>">
        <input type="hidden" name="garden" value="<?php echo $row['garden'] ?>">
        <input type="hidden" name="parkingAvailability" value="<?php echo $row['parkingAvailability'] ?>">
        <input type="hidden" name="nearbyFacilities" value="<?php echo $row['nearbyFacilities'] ?>">
        <input type="hidden" name="mainRoads" value="<?php echo $row['mainRoads'] ?>">
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <input type="submit" name="submit" value="Add this to your wishlist">
    </form>


</body>

</html>