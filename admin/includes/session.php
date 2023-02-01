<?php


class Session{
    private $signed;
    public $user_id;
    public $massege;
    public $count;

  function __construct(){
        session_start();
        $this->visitor_count();
        $this->check_the_login();
        $this->check_massege();

    }

 public function visitor_count(){
    if(isset($_SESSION['count'])){
        return $this->count = $_SESSION['count']++;
    }else{
        return $_SESSION['count']=1;
    }
 }


 public function signed_in(){
    return $this->signed;
 }
    function check_the_login(){
        if(isset($_SESSION['id'])){
            $this->user_id = $_SESSION['id'];
            $this->signed = true;
        }else{
            unset($this->user_id);
            $this->signed = false;
        }
    }

    public function logined($user){
        if($user){
            $this->user_id = $_SESSION['id'] = $user->id;
            $this->signed = true;
        }
    }

    public function logout(){
        unset($_SESSION['id']);
        unset($this->signed);
        $this->signed = false;
    }


    public function masseage($msg= ''){
        if(!empty($msg)){
            $_SESSION['massege'] = $msg;
        }else{
            return $this->massege;
        }
    }

    public function check_massege(){
        if(isset($_SESSION['massege'])){
            $this->massege = $_SESSION['massege'];
            unset($_SESSION['massege']);
        }else{
            $this->massege="";
        }
    }


}

$session = new Session();
$massege = $session->masseage();