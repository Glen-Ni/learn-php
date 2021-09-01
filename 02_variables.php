<?php

// What is a variable

// Variable types
/*
 * String
 * Integer
 * Float/Double
 * Boolean
 * Null
 * Array
 * Object
 * Resource
 */
//phpinfo();

// Declare variables
$name = 'laowang';
$name = 'laowang';
$age = 28;
$isMale = true;
$isGay = false;
$height = 1.90;
$salary = null;

// Print the variables. Explain what is concatenation
echo $name . '<br>';
echo $age . '<br>';
echo $isMale . '<br>'; // true 会转为 1
echo $isGay . '<br>'; // false 会转为 ""
echo $height . '<br>';
echo $salary . '<br>';

// Print types of the variables
echo gettype($name) . '<br>';
echo gettype($age) . '<br>';
echo gettype($isMale) . '<br>';
echo gettype($isGay) . '<br>';
echo gettype($height) . '<br>';
echo gettype($salary) . '<br>';

// Print the whole variable
var_dump($name,
  $age,
  $isMale,
  $isGay,
  $height,
  $salary);

// Change the value of the variable
$name = false;

// Print type of the variable
echo '<br>';
echo gettype($name).'<br>';

// Variable checking functions
echo '~~~~~~~~~~~~~~~~~~~~~~~~~~~<br>';
echo is_string($name). '1111<br>';
echo is_int($age). '<br>';
echo is_bool($isMale).'ismale<br>';
echo is_float($height);

// Check if variable is defined
echo 'xxx~~~~~~~~~~~~~~~~~~~~~~~~~~<br>';
echo isset($name);
echo isset($myname);

// Constants
echo '~~~~~~~~~~~~~~~~~~~~~~~~~~~<br>';
define('PI', 3.1415);
echo PI.'<br>';

// Using PHP built-in constants
echo SORT_ASC.'<br>';
echo PHP_INT_MAX.'<br>';
