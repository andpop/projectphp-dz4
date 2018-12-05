<?php

class Engine
{
    const TEMPERATURE_INCREASE_STEP = 5;
    const TEMPERATURE_INCREASE_THRESHOLD = 10;
    const FAN_START_TEMPERATURE_THRESHOLD = 90;
    const STATE_STARTED = 'on';
    const STATE_STOPPED = 'off';
    private $state = 'on';
    private $hp = 1;
    private $temperature = 0;
    private $mileage = 0;
    private $fan;

    public function __construct($hp)
    {
        $this->hp = $hp;
        $this->fan = new Fan($this);
    }

    public function startEngine()
    {
        if ($this->state === self::STATE_STOPPED) {
            $this->state = self::STATE_STARTED;
            echo "Двигатель заведен";
        }
    }

    public function stopEngine()
    {
        if ($this->state === self::STATE_STARTED) {
            $this->state = self::STATE_STOPPED;
            echo "Двигатель заглушен";
        }
    }

    public function accelerate()
    {
        $this->mileage++;
        $passedTenMeters = ($this->mileage % self::TEMPERATURE_INCREASE_THRESHOLD === 0);

        if ($passedTenMeters) {
            $this->temperature += self::TEMPERATURE_INCREASE_STEP;
            echo "Температура двигателя повысилась на " .self::TEMPERATURE_INCREASE_STEP;
            echo "Текущая температура двигателя {$this->temperature} C";
        }
        if ($this->temperature === self::FAN_START_TEMPERATURE_THRESHOLD) {
            $this->fan->turnOn();
            $this->fan->turnOff();
            echo "Текущая температура двигателя: {$this->temperature} C";
        }
    }

    public function getHp()
    {
        return $this->hp;
    }

    public function decreaseTemperature($step)
    {
        if ($this->temperature >= $step) {
            $this->temperature = $this->temperature - $step;
            echo "Температура двигателя снижена на {$step} C";
        }
    }

    public function getMileage()
    {
        return $this->mileage;
    }

    public function getGear($direction)
    {
        if ($direction == 'forward') {
            echo "Движение вперед";
        } elseif ($direction == 'backward') {
            echo "Движение назад";
        }
    }
}
