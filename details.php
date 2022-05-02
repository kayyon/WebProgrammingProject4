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
    <link rel="stylesheet" href="index.css" />
    <title>Properties</title>
</head>

<body>

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

    <div id="propForm">
        <form action="details.php" method="POST">

            <p>
                <label for="propertyValue">propertyValue:</label>
                <input type="number" name="propertyValue">
            </p>

            <p>
                <label for="location">Location</label>
                <input type="text" name="location" value="<?php echo $row['location'] ?>">
            </p>

            <p>
                <label for="age">Age:</label>
                <input type="number" name="age" value="<?php echo $row['age'] ?>">
            </p>

            <p>
                <label for="bedroomNum">Number of bedrooms:</label>
                <input type="number" name="bedroomNum" value="<?php echo $row['bedroomNum'] ?>">
            </p>

            <p>
                <label for="bathroomNum">Number of bathrooms:</label>
                <input type="number" name="bathroomNum" value="<?php echo $row['bathroomNum'] ?>">
            </p>

            <p>
                <label for="garden">Garden:</label>
                <input type="hidden" name="garden" value="0">
                <input type="checkbox" name="garden" value="1">
            </p>

            <p>
                <label for="parkingAvailability">Parking Availability:</label>
                <input type="hidden" name="parkingAvailability" value="0">
                <input type="checkbox" name="parkingAvailability" value="1">
            </p>

            <p>
                <label for="nearbyFacilities">Nearby Facilities:</label>
                <input type="hidden" name="nearbyFacilities" value="0">
                <input type="checkbox" name="nearbyFacilities" value="1">

            </p>

            <p>
                <label for="mainRoads">Main Roads:</label>
                <input type="hidden" name="mainRoads" value="0">
                <input type="checkbox" name="mainRoads" value="1">
            </p>
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            <input type="submit" value="Update Property Details" name="submit" />
        </form>
    </div>

    <form action="delete.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <input type="submit" value="Delete Property Details">
    </form>

    <button id="btn">Edit Property Details</button>
    <script src="index.js"></script>

    <?php
    include 'db.php';
    if (isset($_POST['submit'])) {
        $propertyValue = $_POST['propertyValue'];
        $location = $_POST['location'];
        $age = $_POST['age'];
        $bedroomNum = $_POST['bedroomNum'];
        $bathroomNum = $_POST['bathroomNum'];
        $garden = $_POST['garden'];
        $parkingAvailability = $_POST['parkingAvailability'];
        $nearbyFacilities = $_POST['nearbyFacilities'];
        $mainRoads = $_POST['mainRoads'];
        $propertyTax = (7 / 100) * $propertyValue;

        $sql_query = "UPDATE properties SET 
        propertyValue =" . $propertyValue . ", 
        location =" . $location . ", 
        age=" . $age . ", 
        bedroomNum =" . $bedroomNum . ", 
        bathroomNum =" . $bathroomNum . ", 
        garden =" . $garden . ", 
        parkingAvailability =" . $parkingAvailability . ", 
        nearbyFacilities =" . $nearbyFacilities . ", 
        mainRoads=" . $mainRoads . ",
        propertyTax=" . $propertyTax . "
        WHERE id=" . $id;
        mysqli_query($mysqli, $sql_query) or die(mysqli_error($mysqli));
    }

    $mysqli->close();
    ?>
</body>

</html>