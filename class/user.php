<?php 
  class User{
    private $id;
    private $name;
    private $email;
    private $life;
    public function __construct($id,$name,$life)
    {
      $this -> id = $id;
      $this -> name = $name;
      $this -> life = $life;
    }
    public function getId(){
      return $this -> id;
    }
    public function getName(){
      return $this -> name;
    }
    public function getEmail(){
      return $this -> email;
    }
    public function getLife(){
      return $this -> life;
    }
  }
?>