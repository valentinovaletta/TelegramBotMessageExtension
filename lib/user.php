<?php 

namespace TestLib\TestClass;

class User{

    private $name;

    public function __construct($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }
}