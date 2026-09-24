<?php
declare(strict_types=1);

session_start();

function redirect_to_login(string $message, string $email = ''): void
{
    $_SESSION['loginMessage'] = $message;
    $_SESSION['loginEmail'] = $email;
    header('Location: login_form.php', true, 303);
    exit;
}

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    header('Location: login_form.php');
    exit;
}

$emailInput = $_POST['email'] ?? null;
$passwordInput = $_POST['password'] ?? null;
$email = is_string($emailInput) ? trim($emailInput) : '';
$password = is_string($passwordInput) ? $passwordInput : '';

if ($email === '' || $password === '') {
    redirect_to_login('Enter your email and password.', $email);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    redirect_to_login('Enter a valid email address.', $email);
}

try {
    require_once __DIR__ . '/database.php';
    $data = database_connection();

    $stmt = $data->prepare(
        'SELECT user_id, email, password, role, status FROM users WHERE email = ? LIMIT 1'
    );
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();
    $stmt->close();
} catch (Throwable $error) {
    error_log('Login database error: ' . $error->getMessage());
    redirect_to_login('Sign in is temporarily unavailable. Please try again.', $email);
}

if (!$user || !password_verify($password, $user['password'])) {
    redirect_to_login('Email or password is incorrect.', $email);
}

if ($user['status'] !== 'active') {
    redirect_to_login('Your account is inactive. Contact the school office.', $email);
}

$destinations = [
    'student' => 'studenthome.php',
    'teacher' => 'teacherhome.php',
    'admin' => 'adminhome.php',
];

if (!isset($destinations[$user['role']])) {
    redirect_to_login('Unable to sign in. Contact the school office.', $email);
}

session_regenerate_id(true);
unset($_SESSION['loginMessage'], $_SESSION['loginEmail']);
$_SESSION['user_id'] = $user['user_id'];
$_SESSION['email'] = $user['email'];
$_SESSION['role'] = $user['role'];

header('Location: ' . $destinations[$user['role']], true, 303);
exit;
