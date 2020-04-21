<?php
require "mysqli_connect.php";

$sql = "SELECT id, size, sauce, time, price, toppings,cheese, cooked, delivered FROM he_order";
$result = $dbc->query($sql);

?>
<html>
<head>
<link rel="stylesheet" href="main.css"
</head>
<body>
<h1>View Orders</h1>
<table border="2">
    <tr>
        <th>
            ID
        </th>
        <th>
            Size
        </th>
        <th>
            Sauce
        </th>
        <th>
            Cheese
        </th>
        <th>
            Toppings
        </th>
        <th>
            Price
        </th>
        <th>
            Time
        </th>
        <th>
            Cooked
        </th>
        <th>
            Delivered
        </th>
    </tr>
<?php

if($result->num_rows>0){
    //output data of each row
    while($row = $result->fetch_assoc()){
        echo "<tr><td>".$row['id']."</td><td>".$row['size']."</td><td>".
            $row['sauce']."</td><td>".$row['cheese']."</td><td>".$row['toppings'].
            "</td><td>".$row['price']."</td><td>".$row['time']."</td><td>".$row['cooked']."</td><td>".$row['delivered']."</td></tr>";
    }
}
?>

</table>

<?php
if(array_key_exists('cooked', $_POST)) {
    button1($dbc);
}
else if(array_key_exists('delivered', $_POST)) {
    button2($dbc);
}
function button1($dbc) {
    $id = $_REQUEST['orderID'];
    //updates cooked time to current time
    $sql = "UPDATE he_order SET cooked=NOW() WHERE id=$id";
    $result = $dbc->query($sql);
    //refreshes page so table updates
    echo '<meta http-equiv="refresh" content="0;">';

}
function button2($dbc) {
    $id = $_REQUEST['orderID'];

    //makes sure that the food has already been cooked
    $sql = "select cooked from he_order where id=$id";
    $result = $dbc->query($sql);
    $row=$result->fetch_assoc();
    if($row['cooked']!=NULL) {
        //updates the time to current time as button is clicked
        $sql = "UPDATE he_order SET delivered=NOW() WHERE id=$id";
        $result = $dbc->query($sql);
    }
    //refreshes page so the table updates
    echo '<meta http-equiv="refresh" content="0; ">';
}
?>
<a href="index.php"><h3>Order a pizza!</h3></a>
<h3>Update Order Information</h3>
<form method="post">
    <p>Enter Order ID:<input type="text" name="orderID" required></p>
    <input type="submit" name="cooked"
           class="button" value="Cooked" />

    <input type="submit" name="delivered"
           class="button" value="Delivered" />
</form>
</body>
</html>
