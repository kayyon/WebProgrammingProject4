<!DOCTYPE html>
<?php
include 'db.php';
session_start();
if (empty($_SESSION['search'])) {
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
    <title>Search Properties</title>
</head>

<body>
    <form action="logout.php">
        <button type="logout">Logout</button>
    </form>

    <div id="propForm">
        <form action="search.php" method="POST" enctype="multipart/form-data">
            <p>
                <label for="propertyValue">propertyValue:</label>
                <input type="number" name="propertyValue">
            </p>

            <p>
                <label for="location">Location</label>
                <input type="text" name="location">
            </p>

            <p>
                <label for="age">Age:</label>
                <input type="number" name="age">
            </p>

            <p>
                <label for="bedroomNum">Number of bedrooms:</label>
                <input type="number" name="bedroomNum">
            </p>

            <p>
                <label for="bathroomNum">Number of bathrooms:</label>
                <input type="number" name="bathroomNum">
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
            <input type="submit" value="Search" name="submit" />
        </form>
    </div>

    <button id="btn">Click here to list a property</button>
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
        $sql_query = "SELECT * FROM properties WHERE propertyValue='$propertyValue' OR location='$location' 
        OR age='$age' OR bedroomNum='$bedroomNum' OR bathroomNum='$bathroomNum' OR garden='$garden' 
        OR parkingAvailability='$parkingAvailability' OR nearbyFacilities='$nearbyFacilities' 
        OR mainRoads='$mainRoads' OR propertyTax='$propertyTax';";
    }

    $result = $mysqli->query($sql_query);
    mysqli_query($mysqli, $sql_query) or die(mysqli_error($mysqli));
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
    $mysqli->close();
    ?>
</body>

</html>