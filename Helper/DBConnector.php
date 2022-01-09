<?php

namespace CRUD\Helper;

class DBConnector
{

    /** @var mixed $db */
    private $db;
    private $servername;
    private $username;
    private $password;
    private $dbname;

    public function __construct($servername, $username, $password, $dbname)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    /**
     * @throws \Exception
     * @return void
     */
    public function connect(): void
    {

        // Create connection
        $this->db = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if (!$this->db) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            // echo "Connected successfully";
        }

    }

    /**
     * @param string $query
     * @return bool
     */
    public function execQuery(string $query): bool
    {
        // echo $query;
        if ($this->db->query($query) === true) {
            echo "successfull";

            return true;
        }
        echo "Error: " . $query . "<br>" . $this->db->error;
        $this->db->close();
        return false;
    }
    public function execQueryForFecth(string $query)
    {

        return $this->db->query($query);

    }

    /**
     * @param string $message
     * @throws \Exception
     * @return void
     */
    private function exceptionHandler(string $message): void
    {
        echo "error " . $message;
    }
}
