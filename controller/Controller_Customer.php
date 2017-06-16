<?php
include_once ("../DBConnection/DBConnection.php");
include_once ("../model/Customer.php");
/**
 * Created by PhpStorm.
 * User: Dell-Pc
 * Date: 6/15/2017
 * Time: 10:25 AM
 */
class Controller_Customer extends DBConnection
{
    public function Controller_Customer() {
        parent::DBConnection();
    }

    public function register(Customer $c) {
        $sql = "insert into customer(`customer_id`, `first_name`, `last_name`, `username`, `phone_no`, `address`, `gender`, `password`) values(NULL, ?, ?, ?, ?, ?, ?, ?)";

        try {
            $stm = $this -> getConnection() -> prepare($sql);

            $fname = $c -> getFirstName();
            $lname = $c -> getLastName();
            $username = $c -> getUsername();
            $phone = $c -> getPhoneNo();
            $address = $c -> getAddress();
            $gender = $c -> getGender();
            $pass = $c -> getPassword();

            $stm -> bind_param('sssisss', $fname, $lname, $username, $phone, $address, $gender, $pass);
            $res = $stm -> execute();


        } catch (SQLiteException $e) {
            echo $e;
        }

        return $res;
    }

    public function login(Customer $c) {
        $sql = "select * from customer where username = ? and password = ?";

        try {
            $stm = $this -> getConnection() -> prepare($sql);

            $uname = $c -> getUsername();
            $pass = $c -> getPassword();

            $stm -> bind_param('is', $uname, $pass);
            $stm -> execute();

            while ($row = $stm -> fetch()) {
                return true;
            }

        } catch (SQLiteException $e) {
            echo $e;
        }

        return false;
    }
}