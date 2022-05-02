<!DOCTYPE html>
<?php
session_start();
if (empty($_SESSION['logged_in'])) {
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

    <?php
    include 'db.php';
    if (isset($_POST['submit'])) {
        $image = $_POST['image'];
        $propertyValue = $_POST['propertyValue'];
        echo $propertyValue;
        $location = $_POST['location'];
        $age = $_POST['age'];
        $bedroomNum = $_POST['bedroomNum'];
        $bathroomNum = $_POST['bathroomNum'];
        $garden = $_POST['garden'];
        $parkingAvailability = $_POST['parkingAvailability'];
        $nearbyFacilities = $_POST['nearbyFacilities'];
        $mainRoads = $_POST['mainRoads'];
        $propertyTax = (7 / 100) * $propertyValue;
        $id = $_POST['id'];
        echo $id;
        $sql_query = "INSERT INTO wishlist (id, propertyValue, location, age, bedroomNum, bathroomNum, garden, parkingAvailability, nearbyFacilities, mainRoads, propertyTax, image, user_id) 
		VALUES('$id', '$propertyValue', '$location', '$age', '$bedroomNum', '$bathroomNum', '$garden', '$parkingAvailability', '$nearbyFacilities', '$mainRoads', '$propertyTax', '$image', '" . $_SESSION["user_id"] . "')";
        mysqli_query($mysqli, $sql_query) or die(mysqli_error($mysqli));
    }
    $mysqli->close();
    ?>

    <?php
    include 'db.php';
    $sql_query = "SELECT * FROM wishlist WHERE user_id=" . $_SESSION["user_id"];
    $result = $mysqli->query($sql_query);
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
            echo "<form action=\"buydetails.php\" method = \"POST\">";
            echo "<input type=\"hidden\" name=\"id\" value = \"" . $row["id"] . "\">";
            echo "<input type=\"submit\" value=\"View Property\">";
            echo "</form>";
            echo "<form action=\"deletewish.php\" method=\"POST\">";
            echo "<input type=\"hidden\" name=\"id\" value=\"" . $row['id'] . "\">";
            echo "<input type=\"submit\" value=\"Delete Property Details\">";
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