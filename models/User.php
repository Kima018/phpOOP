<?php

namespace models;

include "Db.php";

class User
{
    public string $first_name;
    public string $last_name;
    public string $email;
    private string $password;


    public function __construct($first_name, $last_name, $email, $password)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }


    public function userRegister()
    {
        global $conn;
        $stmt = mysqli_prepare($conn, "INSERT INTO korisnik(ime,prezime,email,sifra) VALUES (?,?,?,?)");
        mysqli_stmt_bind_param($stmt, "ssss", $this->first_name, $this->last_name, $this->email, $this->password);
        mysqli_stmt_execute($stmt);
    }

    public function userExists()
    {
        global $conn;
        $stmt = mysqli_prepare($conn, "SELECT email FROM korisnik WHERE email=?");
        mysqli_stmt_bind_param($stmt, "s", $this->email);
        mysqli_stmt_execute($stmt);
        return (bool)mysqli_stmt_get_result($stmt)->num_rows;

    }

}

