<?php
function validateEmail($email)
{
    return preg_match('/^\S+@\S+\.\S+$/', strtolower($email));
}

function validateName($name)
{
    return preg_match("/^[a-zA-Z]+$/", $name);
}


function validatePassword($password)
{
    return preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $password);
}