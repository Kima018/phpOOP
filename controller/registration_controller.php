<?php

use models\User;

require_once "../models/User.php";
require_once "../helpers/Validator.php";

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
$validator = new Validator();

foreach ($fields_to_validate as $field_name => $field_value) {

    if (in_array($field_name, ['first_name', 'last_name']) && !$validator->validateName($field_value)) {
        $validation_failed[$field_name] = "Name can only contain characters, no spaces";
    }
    if ($field_name === 'email' && !$validator->validateEmail($field_value)) {
        $validation_failed[$field_name] = "Wrong email format";
    }
    if ($field_name === 'password' && !$validator->validatePassword($field_value)) {
        $validation_failed[$field_name] = "Password must contain min one: A,a,1, min 8 characters";
    }
    if (!empty($validation_failed)) {
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
