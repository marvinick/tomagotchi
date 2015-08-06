<?php

class Tomagatchi {

    private $name;
    private $food;
    private $time;
    private $happiness;
    private $sleep;

    function __construct($name, $food, $time, $happiness, $sleep) {
        $this->name = $name;
        $this->food = $food;
        $this->time = $time;
        $this->happiness = $happiness;
        $this->sleep = $sleep;
    }

    function setName($new_name){
        $this->name = (string) $new_name;
    }

    function getName(){
        return $this->name;
    }

    function setFood($new_food){
        $this->food = (string) $new_food;
    }

    function getFood(){
        return $this->food;
    }

    function setTime($new_time){
        $this->time = (string) $new_time;
    }

    function getTime(){
        return $this->time;
    }

    function setHappiness($new_happiness){
        $this->happinesss = (string) $new_happiness;
    }

    function getHappiness(){
        return $this->happiness;
    }

    function setSleep($new_sleep){
        $this->sleep = (string) $new_sleep;
    }

    function getSleep(){
        return $this->sleep;
    }

    function save() {
      array_push($_SESSION['tomagatchi_data'], $this);
    }

    static function getAll() {  //getting list of
      return $_SESSION['tomagatchi_data'];
    }

    static function deleteAll() {
      $_SESSION['tomagatchi_data'] = array();
    }
}
