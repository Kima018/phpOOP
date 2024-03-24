<?php
function validateEmail($email)
{
    return preg_match('/^\S+@\S+\.\S+$/', strtolower($email));
}

function validateName($first_name)
{
    return preg_match("/^[a-zA-Z]+$/", $first_name);
}


function validatePassword($password)
{
    return preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $password);
}