<?php

namespace CRUD\Helper;

use CRUD\Helper\DBConnector;

class PersonHelper
{

    private $db;

    public function __construct()
    {
        $this->db = new DBConnector("localhost", "root", "", "test");
        $this->db->connect();
    }
    public function insert()
    {

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $username = $_POST['username'];

        $sql = "INSERT INTO people (firstName, lastname, username)
         VALUES ('$firstName','$lastName', '$username' )";
        $this->db->execQuery($sql);

    }

    public function fetch(int $id)
    {
        $sql = "SELECT id, firstName, lastName, username FROM people WHERE id='$id'";
        $result = $this->db->execQueryForFecth($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"] . " - Name: " . $row["firstName"] . " " . $row["lastName"] . " " . $row["username"] . "<br>";
            }
        } else {
            echo "0 results";
        }

    }

    public function fetchAll()
    {
        $sql = "SELECT * FROM people";
        $result = $this->db->execQueryForFecth($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"] . " - Name: " . $row["firstName"] . " " . $row["lastName"] . " " . $row["username"] . "<br>";
            }
        } else {
            echo "0 results";
        }
    }

    public function update()
    {
        $fname = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $username = $_POST['username'];

        $sql = "UPDATE people SET firstname='$fname', lastname='$lastName' WHERE username='$username'";

        $this->db->execQuery($sql);
    }

    public function delete()
    {
        $username = $_POST['username'];
        $sql = "DELETE FROM people WHERE username='$username'";
        $this->db->execQuery($sql);
    }

}
