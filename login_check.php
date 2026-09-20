<?php

session_start();

$data = new mysqli("localhost", "root", "", "studentproject");

if ($data->connect_error) {
    die("Connection error: " . $data->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ?";

    $stmt = $data->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {

        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {

            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['role'] = $row['role'];

            if ($row['role'] == "student") {

                header("Location:studenthome.php");
                exit();

            } elseif ($row['role'] == "teacher") {

                header("Location: teacherhome.php");
                exit();

            } elseif ($row['role'] == "admin") {

                header("Location: adminhome.php");
                exit();

            } else {

                echo "Invalid user role.";

            }

        } else {

            $_SESSION['loginMessage'] = "Incorrect password.";
            header("Location: login_form.php");
            exit();

        }

    } else {

        $_SESSION['loginMessage'] = "User not found.";
        header("Location: login_form.php");
        exit();

    }

    $stmt->close();
}

$data->close();

?>