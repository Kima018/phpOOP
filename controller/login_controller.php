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
    die("Wrong email");
}

$user = new User($_POST['email'],$_POST['password']);
$user_details = $user->userExists();

if (!password_verify($_POST['password'],$user_details['sifra'])){
    die("Wrong password");
}
session_start();
$_SESSION['registered'];
$encoded_email = urlencode($_POST['email']);
header("Location: ../index.php?user-registered=$encoded_email");




