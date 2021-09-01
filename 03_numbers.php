<?php

// Declaring numbers
$a = 5;
$b = 4;
$c = 1.2;

// Arithmetic operations
echo ($a + $b) * $c . '<br>';
echo ($a - $b) . '<br>';


// Assignment with math operators
$a += $b; echo $a. '<br>';

// Increment operator
echo $a++ . '要把前面的注释掉<br>'; // 5 先打印再递增
echo ++$a . '<br>'; // 7

// Decrement operator
echo $a++ . '<br>'; // 5 先打印再递增
echo ++$a . '<br>'; // 7

// Number checking functions
echo '~~~~~~~~~~~~~~~~~~~~~~~~~~~<br>';
echo is_float(1.25); // true
echo is_int(1.25); // false
echo is_double(1.25); // true
echo is_numeric('3.45'); // true
echo is_numeric('3g.45'); // false

// Conversion
$strNumber = '12.34';
$number = (float)$strNumber;
var_dump($number);

// Number functions
echo 'abs(-15)' . abs(-15) . '<br>';
echo "pow(2,3)" . pow(2, 3) . '<br>';
echo 'sqrt(16)' . sqrt(16) . '<br>';
echo 'max(2,3)' . max(2,3, 9, 10, 11) . '<br>';
echo 'floor max min ceil ';

// Formatting numbers
$number = 123123123.123123;
echo number_format($number, 2, '.', ',');

// https://www.php.net/manual/en/ref.math.php
