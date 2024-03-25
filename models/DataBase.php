<?php

namespace models;

class DataBase
{
    private string $servername;
    private string $username;
    private string $password;
    private string $dbname;
    protected mixed $conn;

  protected function __construct(string $servername = "localhost", string $username = "root", string $password = "", string $dbname = "test_baza")
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
        $this->connect();
    }

    protected function connect()
    {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed" . $this->conn->connect_error);
        }
        return $this->conn;
    }


    public function closeConnection(): void
    {
        $this->conn->close();
    }

}

