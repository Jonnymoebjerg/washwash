<?php

include_once 'dbtable.php';

class user extends dbTable {

    protected $fields = array("id", "username", "password", "customer_num", "email");
    protected $tablename = "app_users";

    public function getId() {
        return $this->properties["id"];
    }

    public function getUsername() {
        return $this->properties["username"];
    }

    public function setUsername($username) {
        $this->properties["username"] = $username;
    }

    public function getPassword() {
        return $this->properties["password"];
    }

    public function setPassword($password) {
        $this->properties["password"] = $password;
    }

    public function getCustomerNumber() {
        return $this->properties["customer_num"];
    }

    public function setCustomerNumber($customer_num) {
        $this->properties["customer_num"] = $customer_num;
    }

    public function getEmail() {
        return $this->properties["email"];
    }

    public function setEmail($email) {
        $this->properties["email"] = $email;
    }

    public function getUsers($parameter = NULL) {
        //parameters
        $sql = "SELECT id FROM $this->tablename";
        if ($parameter) {
            $sql .= " $parameter";
        }
        $result = $this->conn->query($sql);

        $users = array();
        while ($row = $result->fetch_object()) {
            $users[$row->id] = new user($this->conn, $row->id);
        }
        return $users;
    }

    function login($username, $password) {
        $sql = "SELECT username, password FROM $this->tablename WHERE username='$username' AND password='$password'";
        $query = mysqli_query($this->conn, $sql);
        $num_rows = mysqli_num_rows($query);
        if ($num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function forgotPwd($email){
        $sql = "SELECT id, username, email FROM $this->tablename WHERE email='$email'";
        $result = mysqli_query($this->conn, $sql);
        $num_rows = mysqli_num_rows($result);
        if($num_rows > 0) {
            $row = $result->fetch_object();
            return $row->id;
        } else {
            return false;
        }
    }
}
