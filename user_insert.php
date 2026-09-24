
<?php

session_start();

require_once __DIR__ . '/database.php';
$data = database_connection();

// Check connection
if ($data->connect_error) {
    die("Database connection failed: " . $data->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Invalid request.");
}

// Get data from form
$fname = trim($_POST["fname"] ?? "");
$lname = trim($_POST["lname"] ?? "");
$email = trim($_POST["email"] ?? "");
$password = $_POST["password"] ?? "";
$role = $_POST["role"] ?? "";
$status = $_POST["status"] ?? "active";

// Validate required fields
if (
    empty($fname) ||
    empty($lname) ||
    empty($email) ||
    empty($password) ||
    empty($role)
) {
    die("Please fill in all required fields.");
}

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address.");
}
// Allow only these roles
$allowed_roles = ["student", "teacher", "admin"];

if (!in_array($role, $allowed_roles, true)) {
    die("Invalid user role.");
}

// Allow only these statuses
$allowed_statuses = ["active", "inactive"];

if (!in_array($status, $allowed_statuses, true)) {
    die("Invalid account status.");
}

// Check if email already exists
$check = $pdo->prepare(
    "SELECT user_id FROM users WHERE email = ? LIMIT 1"
);

$check->execute([$email]);

if ($check->fetch()) {
    die("An account with this email already exists.");
}

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert user
$sql = "
    INSERT INTO users
    (first_name, last_name, email, password, role, status)
    VALUES
    (?, ?, ?, ?, ?, ?)
";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $fname,
    $lname,
    $email,
    $hashed_password,
    $role,
    $status
]);

echo "User account created successfully.";

?>


