<?php


class Person
{
  public string $name;
  public string $surname;
  private ?int $age;  // 类似typescript php中加个？就可以是null了
  public static int $counter = 0;

  public function __construct($name, $surname)
  {
    $this->name = $name;
    $this->surname = $surname;

    self:: $counter++;
  }

  public function setAge($age)
  {
    $this->age = $age;
  }

  public static function getCount()
  {
    return self::$counter;
  }
}