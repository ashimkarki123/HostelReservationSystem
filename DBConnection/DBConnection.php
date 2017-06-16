<?php

/**
 * Created by PhpStorm.
 * User: Dell-Pc
 * Date: 6/15/2017
 * Time: 8:10 AM
 */
class DBConnection{

    private $host;
    private $user;
    private $pass;
    private $database;
    private $conn;

    public function DBConnection(){
        $this -> host ='localhost';
        $this -> user ='root';
        $this -> pass ='';
        $this -> database ='hostelreservation';
    }

    public function getConnection(){
        $this -> conn = new mysqli($this ->host,$this ->user,$this->pass,$this->database) or
        die($this-> conn->error);


        return $this->conn;
    }

}
?>