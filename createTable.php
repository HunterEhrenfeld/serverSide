<?php
require "mysqli_connect.php";

$sql = "CREATE TABLE he_order (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
size VARCHAR(30) NOT NULL,
sauce VARCHAR(30) NOT NULL,
cheese VARCHAR(50) NOT NULL,
toppings VARCHAR(100) NOT NULL,
price double NOT NULL,
time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
//$sql = "DROP TABLE he_order";

if ($dbc->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $dbc->error;
}

$dbc->close();


