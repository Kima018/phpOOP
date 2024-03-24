<?php

use models\User;

require_once "../models/User.php";

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    die("Method is not post");
}

if (!isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'])) {
    die("Something got wrong!");
}
//more conditions for auth
$user = new User($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password']);
if ($user->userExists()) {
    die("User with this email already exists");
}
session_start();
$user->userRegister();
$_SESSION['registered'] = $_POST['email'];
header("Location: ../index.php?message=user-registered");
exit();
