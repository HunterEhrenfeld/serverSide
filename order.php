<?php
require "mysqli_connect.php";
session_start();
if(!isset($_SESSION['loggedin'])){
    header("location:index.php");
}
$sql = "SELECT id, size, sauce, time, price, cooked, delivered,cooked  FROM he_order";
$result = $dbc->query($sql);

//Orders starts at 1 in regards to your own order that isnt in the table yet
$orders = 1;
if($result->num_rows>0){
    //output data of each row
    while($row = $result->fetch_assoc()){
        if($row['cooked']==NULL)
          $orders++;
    }
}
else{
    echo "0 results";
}
$time = $orders * 15;


if($_SERVER['REQUEST_METHOD']=="POST") {
    $size = $_REQUEST["size"];
    $sauce = $_REQUEST["sauce"];
    $cheese = $_REQUEST["cheese"];
    $count = 0;
    $price = 0;

    if(!empty($_POST['topping'])) {
        //counts the number of toppings to generate a price
        foreach($_POST['topping'] as $value){
            $count++;
        }
    }

    if($size=="small"){
        $price+= 4.00;
    }
    elseif ($size=="medium"){
        $price+=6.00;
    }
    elseif($size=="large"){
        $price+=8.00;
    }

    if($sauce=="tomato"){
        $price+=1.00;
    }
    elseif($sauce=="alfredo"){
        $price+=2.00;
    }

    if($cheese=="mozzarella"){
        $price+=0.75;
    }
    elseif($cheese=="provolone"){
        $price+=1;
    }
    elseif($cheese=="parmesan"){
        $price+=0.5;
    }

    if($count!=0){
        $price+=($count*0.75);
    }

    $toppings = "";
    $tempCount = $count;
    if($count==0)
        $toppings="None";
    else{
        foreach ($_POST['topping'] as $selected) {
            $tempCount--;
            if($tempCount==0)
                $toppings=$toppings . $selected;
            else
                $toppings=$toppings . $selected . ", ";
        }
    }

    $sql = "INSERT INTO he_order(id,size,sauce,cheese,toppings,price,time) VALUES (NULL,'$size','$sauce','$cheese','$toppings',$price,NULL)";
    if ($dbc->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $dbc->error;
    }


}
else{
    echo "No form submitted";
}
?>
<html>
<head>
    <link rel="stylesheet" href="main.css" type="text/css">
</head>

<!--Check to see if valid form before using php in html-->
<?php if($_SERVER['REQUEST_METHOD']=="POST") {?>
<body>
<h3 id="order">
    <?php echo "Size: " . $size  . "<br>Sauce: " . $sauce . "<br>Cheese: " . $cheese .
    "<br>Toppings: " . $toppings;
    ?>
</h3>
<h2 id="price">
    Price: $<?php echo $price?>
</h2>

<h2 id="wait">
    It will take <?php echo $time?> minutes
</h2>

<a href="customer.php"><button>Order Again</button></a>
<a href="viewOrders.php"><button>View Orders</button></a>
</body>
<!--    Ends the check-->
<?php }?>
</html>
