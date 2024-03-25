<?php

use models\User;

require_once "../models/User.php";
require_once "../helpers/Validator.php";

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    die("Method is not post");
}
if (!isset($_POST['email'], $_POST['password'])) {
    die("Something got wrong!");
}
$validator = new Validator();

if (!$validator->validateEmail($_POST['email'])) {
    die("Wrong email format");
}

$user = new User($_POST['email'], $_POST['password']);
if (!$user->userExists()) die("User not exists");
if (!$user->userValidate()) die("Wrong password");

session_start();
$_SESSION['registered'] = $_POST['email'];
header("Location: ../index.php?user-registered");





