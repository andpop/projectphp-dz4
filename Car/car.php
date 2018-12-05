<?php

class Car
{
    protected $Engine;
    public $model;
    public $power;
    public function __construct($model, $transmission, $power)
    {
        $this->Engine = new Engine($transmission, $power);
        $this->model = $model;
    }
    public function Move($distance, $speed, $direction)
    {
        $this->Engine->getGear($direction);
        $this->Engine->accelerate();
        $this->Engine->getHp();
    }
}
