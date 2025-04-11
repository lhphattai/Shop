<?php
class Admin extends Database{
    protected $table = 'admin';
    
    public static function checkLogin($email, $pass){
        $_this = new static;
        $sql = "SELECT * FROM $_this->table WHERE email = '$email' AND password ='$pass'";
        $query = $_this->conn->query($sql);
        return $query->fetch_object();
    }
    
}