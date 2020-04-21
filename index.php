
<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <link rel="stylesheet" href="main.css" type="text/css">
</head>
<body>
<h2>Order</h2>
<form action="order.php" method="post" id="form">
    <p><b>Size:</b></p>
    <input type="radio" id="small" name="size" value="small" required>
    <label for="small">Small</label><br>
    <input type="radio" id="medium" name="size" value="medium" required>
    <label for="medium">Medium</label><br>
    <input type="radio" id="large" name="size" value="large" required>
    <label for="large">Large</label>

    <p><b>Sauce:</b></p>
    <input type="radio" name="sauce" id="tomato" value="tomato" required>
    <label for="tomato">Tomato</label><br>
    <input type="radio" name="sauce" id="alfredo" value="alfredo" required>
    <label for="alfredo">Alfredo</label><br>
    <input type="radio" name="sauce" id="none" value="none" required>
    <label for="none">None</label><br>

    <p><b>Cheese:</b></p>
    <input type="radio" name="cheese" id="mozzarella" value="mozzarella" required>
    <label for="mozzarella">Mozzarella</label><br>
    <input type="radio" name="cheese" id="provolone" value="provolone" required>
    <label for="provolone">Provolone</label><br>
    <input type="radio" name="cheese" id="parmesan" value="parmesan" required>
    <label for="parmesan">Parmesan</label><br>
    <input type="radio" name="cheese" id="none" value="none">
    <label for="none">None</label><br>

    <p><b>Toppings:</b></p>
    <input type="checkbox" name="topping[]" id="pepperoni" value="pepperoni">
    <label for="pepperoni">Pepperoni</label><br>
    <input type="checkbox" name="topping[]" id="sausage" value="sausage">
    <label for="sausage">Sausage</label><br>
    <input type="checkbox" name="topping[]" id="mushrooms" value="mushrooms">
    <label for="mushrooms">Mushrooms</label><br>

<!--    <br><br>-->
<!--    <b><div style="color:white; font-size: 2em;" id="price" class="price">Price: $0.00</div></b>-->
    <br><br>

    <button>Order</button>
</form>
<a href="viewOrders.php"><button>View Orders</button></a>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery"></script>
<script>

</script>
</body>
</html>
