<?php

use models\User;

require_once "../models/User.php";
require_once "../helpers/user_helper.php";

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    die("Method is not post");
}
if (!isset($_POST['email'], $_POST['password'])) {
    die("Something got wrong!");
}
if (!validateEmail($_POST['email'])) {
    die("Wrong email format");
}

$user = new User($_POST['email'], $_POST['password']);
$user->userExists() ? null : die("User not exists");
$user->userValidate() ? null : die("Wrong password");

session_start();
$_SESSION['registered'] = $_POST['email'];
$encoded_email = urlencode($_POST['email']);
header("Location: ../index.php?user-registered=$encoded_email");





