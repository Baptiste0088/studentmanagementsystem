<?php

require_once __DIR__ . '/database.php';
$conn = database_connection();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Get data from form
if(isset($_POST['user']))
    {
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];
$status = $_POST['status'];


// Encrypt password before saving
$hashed_password = password_hash($password, PASSWORD_DEFAULT);


// Check if email already exists
$check_email = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($check_email);

if ($result->num_rows > 0) {

    echo "Email already exists!";

} else {

    // Insert user
    $sql = "INSERT INTO users (email, password, role, status)
            VALUES ('$email', '$hashed_password', '$role', '$status')";


    if ($conn->query($sql) === TRUE) {

        echo "
        <script>
            alert('User created successfully!');
            window.location='login.html';
        </script>
        ";

    } else {

        echo "Error: " . $conn->error;

    }
}
    }


// Close connection
$conn->close();

?>
