<?php

// What is class and instance
class Person
{
  public $name;
  public $surname;
  private $age;
  public static $counter = 0;

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

  public  static function getCount() {
    return self::$counter;
  }
  //  protected
}

// 如果不写constructor可以这样赋值
//$p = new Person();
//$p-> name = 'Brad';
//$p-> surname = 'Sb';

$p = new Person('brad', 'sb');
$p -> setAge(22);

echo '<pre>';
var_dump($p);
echo '</pre>';

echo $p->name . '<br>';

$p2 = new Person('small', 'zombie');
echo '<br>counter: '.Person::$counter;




// Create Person class in Person.php

// Create instance of Person

// Using setter and getter