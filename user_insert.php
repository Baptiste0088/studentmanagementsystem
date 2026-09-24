<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header('Location: signup.php');
    exit;
}

require __DIR__ . '/insert_user.php';
