<?php
require "mysqli_connect.php";
$sql = "INSERT INTO he_order(id,size,sauce,cheese,toppings,price,time) VALUES (1,'Small','Tomato','Cheese','Pepperoni',10.25,NULL)";
if ($dbc->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $dbc->error;
}
$dbc->close();
