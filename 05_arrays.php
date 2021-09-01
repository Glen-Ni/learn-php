<?php

// Create array
//$fruits = array();
$fruits = ['Banana', 'Apple', 'Orange'];

// Print the whole array

echo '<pre>';
var_dump($fruits);
echo '</pre>已经在live template里面添加代码段';

// Get element by index
echo $fruits[1] . '<br>';

// Set element by index
$fruits[0] = 'Peach';
echo '<pre>';
var_dump($fruits);
echo '</pre>';

// Check if array has element at index 2
isset($fruits[2]);

// Append element'
$fruits[] = 'Banana';
echo '<pre>';
var_dump($fruits);
echo '</pre>';

// Print the length of the array
echo count($fruits) . '<br>';

// Add element at the end of the array
array_push($fruits, 'aaa', 5, false);
echo '<pre>';
var_dump($fruits);
echo '</pre>';

// Remove element from the end of the array
echo array_pop($fruits);
echo '<pre>';
var_dump($fruits);
echo '</pre>';

// Add element at the beginning of the array
array_unshift($fruits, 'jakfjdk');
echo '<pre>';
var_dump($fruits);
echo '</pre>';

// Remove element from the beginning of the array
array_shift($fruits);
echo '<pre>';
var_dump($fruits);
echo '</pre>';

// Split the string into an array
$string = '1,2,3,4';
echo '<pre>';
var_dump(explode(',', $string));
echo '</pre>';

// Combine array elements into string
echo implode('&', $fruits);

// Check if element exist in the array
echo '<pre>';
var_dump(in_array("array", $fruits));
echo '</pre>';

// Search element index in the array
echo '<pre>';
var_dump(array_search('Apple', $fruits));
echo '</pre>';


// Merge two arrays
$vegetables = [1,2,3];
echo '<pre>';
var_dump(array_merge($fruits,$vegetables));
var_dump([...$fruits,...$vegetables]); // 使用这个需要在设置里面设置一下PHP版本
echo '</pre>';

// Sorting of array (Reverse order also)
sort($fruits);
echo '<pre>';
var_dump($fruits);
echo '</pre>';
echo '<pre>';
var_dump($fruits);
echo '</pre>';

// https://www.php.net/manual/en/ref.array.php

// ============================================
// Associative arrays
// ============================================

// Create an associative array

// Get element by key

// Set element by key

// Null coalescing assignment operator. Since PHP 7.4

// Check if array has specific key

// Print the keys of the array

// Print the values of the array

// Sorting associative arrays by values, by keys


// Two dimensional arrays