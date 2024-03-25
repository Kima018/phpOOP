<?php

class Validator
{
    public function validateEmail($email):int|false
    {
        return preg_match('/^\S+@\S+\.\S+$/', strtolower($email));
    }

    public function validateName($name) : int|false
    {
        return preg_match("/^[a-zA-Z]+$/", $name);
    }


    public function validatePassword($password) : int|false
    {
        return preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $password);
    }
}
