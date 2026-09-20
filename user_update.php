
<?php

session_start();

require_once __DIR__ . '/database.php';
$data = database_connection();

// Check database connection
if ($data->connect_error) {
    die("Database connection failed: " . $data->connect_error);
}


/*
|--------------------------------------------------------------------------
| UPDATE USER
|--------------------------------------------------------------------------
*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_id = $_POST['user_id'];
    $email   = trim($_POST['email']);
    $password = $_POST['password'];
    $role    = $_POST['role'];
    $status  = $_POST['status'];


    /*
    |--------------------------------------------------------------------------
    | Check whether email already belongs to another user
    |--------------------------------------------------------------------------
    */

    $check_sql = "SELECT user_id
                  FROM users
                  WHERE email = ?
                  AND user_id != ?";

    $check_stmt = $data->prepare($check_sql);

    $check_stmt->bind_param(
        "si",
        $email,
        $user_id
    );

    $check_stmt->execute();

    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {

        $message = "Email already belongs to another user.";

    } else {


        /*
        |--------------------------------------------------------------------------
        | If password is empty
        | Keep the existing password
        |--------------------------------------------------------------------------
        */

        if (empty($password)) {

            $sql = "UPDATE users
                    SET email = ?,
                        role = ?,
                        status = ?
                    WHERE user_id = ?";

            $stmt = $data->prepare($sql);

            $stmt->bind_param(
                "sssi",
                $email,
                $role,
                $status,
                $user_id
            );


        } else {


            /*
            |--------------------------------------------------------------------------
            | New password entered
            | Hash password before saving
            |--------------------------------------------------------------------------
            */

            $hashed_password = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            $sql = "UPDATE users
                    SET email = ?,
                        password = ?,
                        role = ?,
                        status = ?
                    WHERE user_id = ?";

            $stmt = $data->prepare($sql);

            $stmt->bind_param(
                "ssssi",
                $email,
                $hashed_password,
                $role,
                $status,
                $user_id
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Execute update
        |--------------------------------------------------------------------------
        */

        if ($stmt->execute()) {

            $message = "User updated successfully.";

        } else {

            $message = "Error updating user: " . $stmt->error;
        }

        $stmt->close();
    }

    $check_stmt->close();
}


/*
|--------------------------------------------------------------------------
| GET USER DATA
|--------------------------------------------------------------------------
|
| This retrieves the existing user information so that
| it can be displayed in the form.
|
*/

if (isset($_GET['student_id'])) {

    $user_id = $_GET['student_id'];

} elseif (isset($_POST['user_id'])) {

    $user_id = $_POST['user_id'];

} else {

    die("User ID is missing.");
}


/*
|--------------------------------------------------------------------------
| Retrieve user
|--------------------------------------------------------------------------
*/

$sql = "SELECT user_id, email, role, status
        FROM users
        WHERE user_id = ?";

$stmt = $data->prepare($sql);

$stmt->bind_param(
    "i",
    $user_id
);

$stmt->execute();

$result = $stmt->get_result();


if ($result->num_rows != 1) {

    die("User not found.");

}

$row = $result->fetch_assoc();

$stmt->close();

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Update User</title>


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f4f6f9;
        }

        .container {
            width: 200px;
            margin: 50px auto;
        }

        .card {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #003366;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #333;
        }

        input,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
            background: white;
        }

        input:focus,
        select:focus {
            outline: none;
            border: 1px solid #007BFF;
        }

        button {
            width: 30%;
            padding: 12px;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 7px;
            font-size: 16px;
            cursor: pointer;
             margin-left:400px;

        
        }

        button:hover {
            background: #0056b3;
        }

        .message {
            margin-bottom: 20px;
            padding: 10px;
            background: #e7f3ff;
            border-radius: 5px;
            color: #003366;
            text-align: center;
        }

        #back {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
             width: 30%;
            padding: 12px;
            color: white;
            border: none;
            border-radius: 7px;
            font-size: 16px;
            cursor: pointer;
            margin-left:400px;
        }

    </style>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>  

</head>

<body>


<div class="container">

    <div class="card">

        <h2>Update User</h2>


        <?php if (isset($message)) { ?>

            <div class="message">
                <?php echo htmlspecialchars($message); ?>
            </div>

        <?php } ?>


        <form method="POST" action="user_update.php">


            <!-- User ID -->

            <input
                type="hidden"
                name="user_id"
                value="<?php echo $row['user_id']; ?>"
            >


            <!-- Email -->

            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="<?php echo htmlspecialchars($row['email']); ?>"
                    required
                >

            </div>


            <!-- Password -->

            <div class="form-group">

                <label>New Password</label>

                <input
                    type="password"
                    name="password"
                    placeholder="Leave blank to keep current password"
                >

            </div>


            <!-- Role -->

            <div class="form-group">

                <label>Role</label>

                <select name="role" required>

                    <option value="student"
                        <?php
                        if ($row['role'] == 'student') {
                            echo 'selected';
                        }
                        ?>>
                        Student
                    </option>


                    <option value="teacher"
                        <?php
                        if ($row['role'] == 'teacher') {
                            echo 'selected';
                        }
                        ?>>
                        Teacher
                    </option>


                    <option value="admin"
                        <?php
                        if ($row['role'] == 'admin') {
                            echo 'selected';
                        }
                        ?>>
                        Admin
                    </option>

                </select>

            </div>


            <!-- Status -->

            <div class="form-group">

                <label>Status</label>

                <select name="status" required>

                    <option value="active"
                        <?php
                        if ($row['status'] == 'active') {
                            echo 'selected';
                        }
                        ?>>
                        Active
                    </option>


                    <option value="inactive"
                        <?php
                        if ($row['status'] == 'inactive') {
                            echo 'selected';
                        }
                        ?>>
                        Inactive
                    </option>

                </select>

            </div>


            <!-- Update button -->

            <button
                type="submit"
                name="update">
                Update User
            </button>


        </form> <br><br>


        <a class="btn btn-success" id='back'
           href="select_user.php">
            Back to Users
        </a>


    </div>

</div>


</body>

</html>


<?php

$data->close();

?>

