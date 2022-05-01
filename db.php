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

// $sql = "CREATE DATABASE property";
// if ($conn->query($db_db) === TRUE) {
//     echo "Database created successfully";
// } else {
//     echo "Error creating database: " . $conn->error;
// }
