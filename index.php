<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css" />
    <title>Properties</title>
    <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #a0a0a0
        }

        tr:nth-child(odd) {
            background-color: #ffffff
        }

        tr:nth-child(1) {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div id="propForm">
        <form action="index.php" method="POST">
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
        $sql_query = "INSERT INTO properties (propertyValue, location, age, bedroomNum, bathroomNum, garden, parkingAvailability, nearbyFacilities, mainRoads, propertyTax) 
	    VALUES('$propertyValue', '$location', '$age', '$bedroomNum', '$bathroomNum', '$garden', '$parkingAvailability', '$nearbyFacilities', '$mainRoads', '$propertyTax')";

        mysqli_query($mysqli, $sql_query) or die(mysqli_error($conn));
    }
    ?>

    <?php
    $sql_query = "SELECT propertyValue, location, age, bedroomNum, bathroomNum, garden, parkingAvailability, nearbyFacilities, mainRoads, propertyTax FROM properties";
    $result = $mysqli->query($sql_query);



    //  Run a loop and display the records on screen dynamically
    // lets say the above query returned 20 rows
    // Now display the table on screen with 20 records
    echo "<h3>Properties</h3>";
    if ($result->num_rows > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div><p>";
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
            echo "</div></p>";
        }
    } else {
        echo "0 results";
    }

    $mysqli->close();
    ?>

</body>

</html>