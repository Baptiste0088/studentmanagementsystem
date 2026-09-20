<?php
error_reporting(0);
session_start();
$data=new mysqli("localhost","root","","studentproject");
if(isset($_POST['user']))
    {
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];
$status = $_POST['status'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$check_email= "SELECT * FROM users WHERE email='$email'";
$result =$data->query($check_email);

if ($result->num_rows > 0) {

    echo "Email already exists!";

} else {

    // Insert user
    $sql = "INSERT INTO users (email, password, role, status)
            VALUES ('$email', '$hashed_password', '$role', '$status')";


    if ($data->query($sql) === TRUE) {

        echo "
        <script>
            alert('User created successfully!');
        </script>
        ";

    } else {

        echo "Error: " . $conn->error;

    }
}
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
</head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            
        }

        .login-container {
            background:aqua;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            width: 350px;
            margin-left:-700px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            background-color:white;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #007BFF;
            color: white;
            padding: 10px;
            margin-top: 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .links {
            text-align: center;
            margin-top: 15px;
        }

        .links a {
            text-decoration: none;
            color: #007BFF;
        }

        .links a:hover {
            text-decoration: underline;
        }
        
    </style>
</head>
<body  background="school_gate.jpg">
<div class="login-container">
    <a href="index.php" class="btn btn-success">Home</a>
    <h2> Login Form</h2>
<h5 style="color:red; font-weight:bold;" >
    <?php 
    session_destroy();
    echo $_SESSION['loginMessage'];
?>
</h5>
    <form action="login_check.php" method="POST">

        <label for="email">Email Address (Username)</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required> </br></br>

<button type="submit" name="login" class="btn btn-primary" >LOGIN</button>

    </form>

    <div class="links">
        <a href="forgot-password.php">Forgot Password?</a><br><br>
    </div>
</div>

</body>
</html>