<?php

class Database{
    public $conn;


    function __construct(){
        $this->connect_to_database();
    }


    public function connect_to_database(){
        $this->conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        if($this->conn->connect_errno){
            die('database connection failed');

        }

    }

    public function query($sql){
    
        $result = mysqli_query($this->conn,$sql);
        if(!$result){
            die("connection faild");
        }
        return $result;
    }

    public function comfirm_query($result){
        if(!$result){
            die("connection faild");
        }
    }

    public function escape_string($string){
      $escape_string =  mysqli_real_escape_string($this->conn, $string);
      return $escape_string;
    }


    public function inserted_id(){
        return mysqli_insert_id($this->conn);
    }
}

$database = new Database();
$database->connect_to_database();