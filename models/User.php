<?php

namespace models;

require_once "DataBase.php";

class User extends DataBase
{
    public string $first_name;
    public string $last_name;
    public string $email;
    private string $password;

    public function __construct(string $email, string $password)
    {
        parent::__construct();
        $this->email = $email;
        $this->password = $password;
    }

    public function setUserName(string $first_name, string $last_name): void
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;

    }

    public function userRegister(): void
    {
        $hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
        $stmt = mysqli_prepare($this->conn, "INSERT INTO korisnik(ime,prezime,email,sifra) VALUES (?,?,?,?)");
        mysqli_stmt_bind_param($stmt, "ssss", $this->first_name, $this->last_name, $this->email, $hashed_password);
        mysqli_stmt_execute($stmt);
    }

    public function userExists(): bool
    {
        $stmt = mysqli_prepare($this->conn, "SELECT email FROM korisnik WHERE email=?");
        mysqli_stmt_bind_param($stmt, "s", $this->email);
        mysqli_stmt_execute($stmt);
        return mysqli_stmt_get_result($stmt)->num_rows > 0;
    }

    public function userValidate(): bool
    {
        $stmt = mysqli_prepare($this->conn, "SELECT sifra FROM korisnik WHERE email=?");
        mysqli_stmt_bind_param($stmt, "s", $this->email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $exist_password);
        mysqli_stmt_fetch($stmt);
        return password_verify($this->password, $exist_password);
    }


}
