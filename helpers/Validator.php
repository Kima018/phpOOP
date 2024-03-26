<?php

class Validator
{
    public function validateEmail(string $email): int|false
    {
        return preg_match('/^\S+@\S+\.\S+$/', strtolower($email));
    }

    public function validateName(string $name): int|false
    {
        return preg_match("/^[a-zA-Z]+$/", $name);
    }


    public function validatePassword(string $password): int|false
    {
        return preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $password);
    }
}
