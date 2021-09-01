<?php

class Person {
    public string $name;
    public int $age;
    private ?float $salary;
    // protected 可以在子类中访问类似于ts
    static int $counter = 0;

    public function __construct($name, $age, $salary)
    {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
        self::$counter++;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    public static function getCounter()
    {
        return self::$counter;
    }
}
