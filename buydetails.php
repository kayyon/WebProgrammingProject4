<!DOCTYPE html>
<?php
session_start();
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
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <input type="submit" value="Add this to your wishlist">
    </form>


</body>

</html>