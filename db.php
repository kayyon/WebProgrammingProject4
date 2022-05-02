<!-- database initialized using UNIX socket on MAMP -->
<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';
$db_db = 'property';

$mysqli = new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db,
);

// create property database
// $sql_property = "CREATE DATABASE IF NOT EXISTS property";
// if ($mysqli->query($sql_property) === TRUE) {
//     echo "Database created successfully";
// } else {
//     echo "Error creating database: " . $conn->error;
// }

if ($mysqli->connect_error) {
    echo 'Errno: ' . $mysqli->connect_errno;
    echo '<br>';
    echo 'Error: ' . $mysqli->connect_error;
    exit();
} else {
    echo 'Success: A proper connection to MySQL was made.';
    echo '<br>';
    echo 'Host information: ' . $mysqli->host_info;
    echo '<br>';
    echo 'Protocol version: ' . $mysqli->protocol_version;
}


// properties table
// $sql_properties = "CREATE TABLE IF NOT EXISTS properties (
//     id MEDIUMINT NOT NULL AUTO_INCREMENT,
//     propertyValue int(20) NOT NULL,
//     location VARCHAR(50) NOT NULL,
//     age int(5) NOT NULL,
//     bedroomNum int(5) NOT NULL,
//     bathroomNum int(5) NOT NULL,
//     garden tinyint(1) NOT NULL,
//     parkingAvailability tinyint(1) NOT NULL,
//     nearbyFacilities tinyint(1) NOT NULL,
//     mainRoads tinyint(1) NOT NULL,
//     propertyTax int(20) NOT NULL,
//     image VARCHAR(50) NOT NULL,
//     user_id int(11) NOT NULL,
//     PRIMARY KEY (id))";

// if (mysqli_query($mysqli, $sql_properties)) {
//     echo "Table properties created successfully";
// } else {
//     echo "Error creating properties table: " . mysqli_error($mysqli);
// }


// // wishlist table
// $sql_wishlist = "CREATE TABLE IF NOT EXISTS wishlist (
//     id MEDIUMINT NOT NULL,
//     propertyValue int(20) NOT NULL,
//     location VARCHAR(50) NOT NULL,
//     age int(5) NOT NULL,
//     bedroomNum int(5) NOT NULL,
//     bathroomNum int(5) NOT NULL,
//     garden tinyint(1) NOT NULL,
//     parkingAvailability tinyint(1) NOT NULL,
//     nearbyFacilities tinyint(1) NOT NULL,
//     mainRoads tinyint(1) NOT NULL,
//     propertyTax int(20) NOT NULL,
//     image VARCHAR(50) NOT NULL,
//     user_id int(11) NOT NULL,
//     PRIMARY KEY (id))";

// if (mysqli_query($mysqli, $sql_wishlist)) {
//     echo "Table properties created successfully";
// } else {
//     echo "Error creating wishlist table: " . mysqli_error($mysqli);
// }


// user table
// $sql_user = "CREATE TABLE IF NOT EXISTS user (
//     user_id int(11) PRIMARY KEY AUTO_INCREMENT,
//     first_name VARCHAR(50) NOT NULL,
//     last_name VARCHAR(50) NOT NULL,
//     username VARCHAR(50) NOT NULL UNIQUE,
//     email VARCHAR(50) NOT NULL UNIQUE,
//     password VARCHAR(255) NOT NULL,
//     buyerSeller tinyint(1) NOT NULL)";

// if (mysqli_query($mysqli, $sql_user)) {
//     echo "Table user created successfully";
// } else {
//     echo "Error creating table: " . mysqli_error($mysqli);
// }


// admin table
// $sql_admin = "CREATE TABLE IF NOT EXISTS admin (
//     username VARCHAR(50) NOT NULL UNIQUE,
//     password VARCHAR(255) NOT NULL)";

// if (mysqli_query($mysqli, $sql_admin)) {
//     echo "Table user created successfully";
// } else {
//     echo "Error creating table: " . mysqli_error($mysqli);
// }