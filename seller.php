<!DOCTYPE html>
<?php
session_start();
if (empty($_SESSION['seller'])) {
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

    <div id="propForm">
        <form action="seller.php" method="POST" enctype="multipart/form-data">

            <p>
                <label for="imageUpload">Upload Image:</label>
                <input type="file" name="imageUpload">
            </p>

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
            <input type="submit" value="Add a property" name="submit" />
        </form>
    </div>

    <button id="btn">+</button>
    <script src="index.js"></script>


    <?php
    include 'db.php';
    if (isset($_POST['submit'])) {
        $target_dir = "photos/";
        $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
        $image = basename($_FILES["imageUpload"]["name"]);
        move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file);
        $propertyValue = $_POST['propertyValue'];
        $location = $_POST['location'];
        $age = $_POST['age'];
        $bedroomNum = $_POST['bedroomNum'];
        $bathroomNum = $_POST['bathroomNum'];
        $garden = $_POST['garden'];
        $parkingAvailability = $_POST['parkingAvailability'];
        $nearbyFacilities = $_POST['nearbyFacilities'];
        $mainRoads = $_POST['mainRoads'];
        $user_id = $_SESSION['user_id'];
        $propertyTax = (7 / 100) * $propertyValue;
        $sql_query = "INSERT INTO properties (propertyValue, location, age, bedroomNum, bathroomNum, garden, parkingAvailability, nearbyFacilities, mainRoads, propertyTax, image, user_id) 
		VALUES('$propertyValue', '$location', '$age', '$bedroomNum', '$bathroomNum', '$garden', '$parkingAvailability', '$nearbyFacilities', '$mainRoads', '$propertyTax', '$image', '$user_id')";
        mysqli_query($mysqli, $sql_query) or die(mysqli_error($mysqli));
    }

    $sql_query = "SELECT * FROM properties WHERE user_id = " . $_SESSION["user_id"];
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
    $mysqli->close();
    ?>

</body>

</html>