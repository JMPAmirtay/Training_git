<?php
    class Humans{
        public $age;
        public $name;
        public $language;
        public $national;
        public $location;
        public static $kazakh = 1;
    }

    $stive = new Humans;
    $stive->age = 18;
    $stive->name = "Stive";
    $stive->national = "Kazakh";
    echo $stive->age . "<br>";
    echo $stive->name . "<br>";
    echo $stive->national . "<br>";
    echo Humans::$kazakh;
?>