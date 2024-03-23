<?php

class DataBase
{
    private string $servername;
    private string $username;
    private string $password;
    private string $dbname;
    private $conn;

    public function __construct($servername, $username, $password, $dbname)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

    }

    private function connect(): void
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed" . $this->conn->connect_error);
        }
    }

    public function getConnect()
    {
        return $this->conn;
    }

    public function closeConnection()
    {
        $this->conn->close();
    }

}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_baza";

$db = new DataBase($servername, $username, $password, $dbname);
$conn = $db->getConnect();

?>
