<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include 'fan.php';
include 'engine.php';
include 'car.php';

$car = new Car(new Engine(200));
$car->startEngine();
$car->Move(320, 1000, 'forward');
$car->stopEngine();
