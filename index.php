<?php
    require "mysqli_connect.php";
    if($_SESSION['loggedin']==true){
        if($_SESSION['type']==1){
            header("location:customer.php");
        }
        else{
            header("location:viewOrders.php");
        }
    }
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $sql = "Select password, Type from he_users where username='$username'";
        $result = $dbc->query($sql);
        if($result->num_rows==0){
            echo "<h1>Credential do not match</h1>";
        }
        else{
            if($result->num_rows>1){
                echo "<h1>Error</h1>";
            }
            else{
                $row = $result->fetch_assoc();
                $hash = $row['password'];
                $type = $row['Type'];
                if(password_verify($password,$hash)){
                    session_start();
                    $_SESSION['username']=$username;
                    $_SESSION['type']=$type;
                    $_SESSION['loggedin']=true;
                    if($type==1){
                        header("Location:customer.php");
                    }
                    else{
                        header("Location:viewOrders.php");
                    }

                }
                else{
                    echo "No";
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
<form action="index.php" method="POST">
    <p>Username: <input type="text" name="username" required></p>
    <p>Password: <input type="password" name="password" required></p>
    <button>Login</button>
</form>
<p>Don't have an account?</p>
<a href="register.php"><button>Register</button></a>
</body>
</html>
