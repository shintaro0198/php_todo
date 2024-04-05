<?php 
  class Todo{
    private $id;
    private $content;
    private $due;
    private $diff;
    private $point = 10;
    public function __construct($id,$content,$due,$diff)
    {
      $this -> id = $id;
      $this -> content = $content;
      $this -> due = $due;
      $this -> diff = $diff;
      $this -> point -= $diff * 5;
    }
    public function getId(){
      return $this -> id;
    }
    public function getContent(){
      return $this -> content;
    }
    public function getDue(){
      return $this -> due;
    }
    public function getPoint(){
      return $this -> point;
    }
  };
?>