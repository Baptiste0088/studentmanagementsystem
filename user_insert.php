
<?php

session_start();

require_once __DIR__ . '/database.php';
$data = database_connection();

// Check connection
if ($data->connect_error) {
    die("Database connection failed: " . $data->connect_error);
}

// Check whether form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $role = $_POST['role'];
    $status = $_POST['status'];

    // Check if email already exists
    $check_sql = "SELECT user_id FROM users WHERE email = ?";

    $check_stmt = $data->prepare($check_sql);
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();

    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {

        echo "<script>
                alert('Email already exists!');
                window.location='select_user.php';
              </script>";
        exit();

    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into database
    $sql = "INSERT INTO users (email, password, role, status)
            VALUES (?, ?, ?, ?)";

    $stmt = $data->prepare($sql);

    if ($stmt) {

        $stmt->bind_param(
            "ssss",
            $email,
            $hashed_password,
            $role,
            $status
        );

        if ($stmt->execute()) {

            echo "<script>
                    alert('User created successfully!');
                    window.location='login_form.php';
                  </script>";

        } else {

            echo "Error creating user: " . $stmt->error;
        }

        $stmt->close();

    } else {

        echo "SQL preparation error: " . $data->error;
    }

    $check_stmt->close();
}

$data->close();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Register User</title>
    <style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    background:#f4f6f9;
}

.container{
    width:420px;
    margin:50px auto;
}

.card{
    background:#fff;
    padding:30px;
    border-radius:10px;
    box-shadow:0 5px 15px rgba(0,0,0,.2);
}

h2{
    text-align:center;
    margin-bottom:25px;
    color:#003366;
}

.form-group{
    margin-bottom:18px;
}

label{
    display:block;
    margin-bottom:6px;
    font-weight:bold;
    color:#333;
}

input,
select{
    width:40%;
    padding:12px;
    border:1px solid #ccc;
    border-radius:5px;
    font-size:15px;
    background:chocplate;
}

input:focus,
select:focus{
    outline:none;
    border:1px solid #007BFF;
}

button{
    width:15%;
    padding:12px;
    background:#007BFF;
    color:#fff;
    border:none;
    border-radius:5px;
    font-size:16px;
    cursor:pointer;
}

button:hover{
    background:#0056b3;
}

</style>
</head>
<body>
    <center>

<h2>Create User Account</h2>

<form action="#" method="POST">

    <label>Email</label><br>
    <input type="email" name="email" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required><br><br>

    <label>Role</label><br>
    <select name="role" required>
        <option value="">--Select Role--</option>
        <option value="student">Student</option>
        <option value="teacher">Teacher</option>
        <option value="admin">Admin</option>
    </select><br><br>

    <label>Status</label><br>
    <select name="status">
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
    </select><br><br>

    <button type="submit" name="save">Create User</button>

</form>
</center>

</body>
</html>
