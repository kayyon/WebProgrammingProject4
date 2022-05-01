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

            <p>
                <label for="sellerBuyer">Check if seller:</label>
                <input type="hidden" name="sellerBuyer" value="0">
                <input type="checkbox" name="sellerBuyer" value="1">
            </p>
            <input type="submit" value="Add a property" name="submit" />
        </form>
    </div>

    <button id="btn">+</button>
    <script src="index.js"></script>


    <?php
    include 'db.php';

    if (isset($_POST['submit'])) {
        $location = $_POST['location'];
        $age = $_POST['age'];
        $bedroomNum = $_POST['bedroomNum'];
        $bathroomNum = $_POST['bathroomNum'];
        $garden = $_POST['garden'];
        $parkingAvailability = $_POST['parkingAvailability'];
        $nearbyFacilities = $_POST['nearbyFacilities'];
        $mainRoads = $_POST['mainRoads'];
        $sellerBuyer = $_POST['sellerBuyer'];

        $sql_query = "INSERT INTO properties (location, age, bedroomNum, bathroomNum, garden, parkingAvailability, nearbyFacilities, mainRoads, sellerBuyer) 
	VALUES('$location', '$age', '$bedroomNum', '$bathroomNum', '$garden', '$parkingAvailability', '$nearbyFacilities', '$mainRoads', '$sellerBuyer')";

        mysqli_query($mysqli, $sql_query) or die(mysqli_error($conn));
    }


    ?>

    <?php
    $sql_query = "SELECT location, age, bedroomNum, bathroomNum, garden, parkingAvailability, nearbyFacilities, mainRoads, sellerBuyer FROM properties";
    $result = $mysqli->query($sql_query);


    echo "<h3>Properties</h3>";
    if ($result->num_rows > 0) {
        // output data of each row
        echo "<table>
	<tr>
		<th>location</th>
		<th>age</th>
		<th>bedroomNum</th>
		<th>bathroomNum</th>
		<th>garden</th>
		<th>parkingAvailability</th>
		<th>nearbyFacilities</th>
		<th>mainRoads</th>
		<th>sellerBuyer</th>
	</tr>";

        //  Run a loop and display the records on screen dynamically
        // lets say the above query returned 20 rows
        // Now display the table on screen with 20 records
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>";
            echo $row["location"];
            echo "</td>";
            echo "<td>";
            echo $row["age"];
            echo "</td>";
            echo "<td>";
            echo $row["bedroomNum"];
            echo "</td>";
            echo "<td>";
            echo $row["bathroomNum"];
            echo "</td>";
            echo "<td>";
            echo $row["garden"];
            echo "</td>";
            echo "<td>";
            echo $row["parkingAvailability"];
            echo "</td>";
            echo "<td>";
            echo $row["nearbyFacilities"];
            echo "</td>";
            echo "<td>";
            echo $row["mainRoads"];
            echo "</td>";
            echo "<td>";
            echo $row["sellerBuyer"];
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $mysqli->close();
    ?>

</body>

</html>