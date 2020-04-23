<?php
    require "mysqli_connect.php";
    session_start();
    if($_SESSION['loggedin']==true){
        if($_SESSION['type']==1){
            header("Location:customer.php");
        }
        else{
            header("Location:viewOrders.php");
        }

    }
    if($_SERVER['REQUEST_METHOD']=="POST") {
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $confirm = $_REQUEST['confirm'];
        $name = $_REQUEST['type'];
        if($name=="customer")
            $type=1;
        else{
            $type=2;
        }

        if($password!=$confirm){
            echo "<h1>Passwords must match</h1>";
        }
        else{
            $valid = true;
            $sql = "Select username From he_users";
            $result = $dbc->query($sql);
            if ($result->num_rows > 0) {
                //output data of each row
                while ($row = $result->fetch_assoc()) {
                    if($row['username']==$username){
                        echo "<h1>Username already exists!</h1>";
                        $valid=false;
                        break;
                    }
                }
            }
            if($valid){
                $hashed = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO he_users(ID,Username,Password,Type) VALUES (NULL,'$username','$hashed','$type')";
                if ($dbc->query($sql) === TRUE) {
                    header("Location: index.php");
                } else {
                    echo "Error: " . $sql . "<br>" . $dbc->error;
                }
            }
        }
    }


?>
<html>
<head>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<form action="register.php" method="post" id="form">
    <p>Username: <input type="text" name="username" required></p>
    <p>Password: <input type="password" name="password" required></p>
    <p>Confirm Password: <input type="password" name="confirm" required></p>
    <p><b>Type:</b></p>
    <input type="radio" name="type" value="customer" required>
    <label for="customer">Customer</label><br>
    <input type="radio" name="type" value="manager" required>
    <label for="manager">Manager</label><br><br>
    <button>Register</button>
</form>
</body>
</html>
