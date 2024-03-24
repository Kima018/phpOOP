<?php

use models\User;

require_once "../models/User.php";

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    die("Method is not post");
}

if (!isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'])) {
    die("Something got wrong!");
}
$validation_failed = [];
$fields_to_validate = [
    'first_name' => $_POST['first_name'],
    'last_name' => $_POST['last_name'],
    'email' => $_POST['email'],
    'password' => $_POST['password']
];
foreach ($fields_to_validate as $field_name => $field_value) {
    if (($field_name === 'first_name' || $field_name === 'last_name') && !validateName($field_value)) {
        $validation_failed[$field_name] = "Name can only contain characters, no spaces";
    }
    if ($field_name === 'email' && !validateEmail($field_value)) {
        $validation_failed[$field_name] = "Wrong email format";
    }
    if ($field_name === 'password' && !validatePassword($field_value)) {
        $validation_failed[$field_name] = "Password must contain min one: A,a,1, min 8 characters";
    }
    if (!empty($validation_field)) {
        die(json_encode($validation_failed));
    }
}

$user = new User($_POST['email'], $_POST['password']);
if ($user->userExists()) {
    die("User with this email already exists");
}
session_start();
$user->setUserName($_POST['first_name'], $_POST['last_name']);
$user->userRegister();
$_SESSION['registered'] = $_POST['email'];
header("Location: ../index.php?message=user-registered");
exit();
