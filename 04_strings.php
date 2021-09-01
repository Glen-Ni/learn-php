<?php

// Create simple string
$name = 'Laowang';
$string = 'Hello'.$name.'. I am king';
$string2 = "Hello $name. I am king";
echo $string.'<br>';
echo $string2.'<br>';

// String concatenation
echo 'aaa'.'sdfsd'.'jji';

// String functions
$string = "    Hello World    ";

echo "1 - " . strlen($string) . '<br>';
echo "2 - " . trim($string) . '<br>';
echo "3 - " . ltrim($string) . '<br>';
echo "4 - " . rtrim($string) . '<br>';
echo "5 - " . str_word_count($string) . '<br>';
echo "6 - " . strrev($string) . '<br>';
echo "7 - " . strtoupper($string) . '<br>';
echo "8 - " . strtolower($string) . '<br>';
echo "9 - " . ucfirst($string) . '<br>';
echo "10 - " . lcfirst($string) . '<br>';
echo "11 - " . ucwords($string) . '<br>';
echo "12 - " . strpos($string, 'World') . '<br>';
echo "13 - " . stripos($string, 'world') . '<br>';
echo "14 - " . substr($string, 8) . '<br>';
echo "15- " . str_replace("World", 'php', $string) . '<br>';
echo "16 - " . str_ireplace("world", 'php', $string) . '<br>';


// Multiline text and line breaks
$longText = "
  Hello, my name is RUA,
  I am 27,
  I love Gakki
";
echo $longText.'<br>';
echo nl2br($longText).'<br> ';

// Multiline text and reserve html tags
$longText = "
  Hello, my name is <b>RUA</b>>,
  I am 27,
  I love <b>Gakki </b>
";
echo $longText.'<br>';
echo nl2br($longText).'<br> ';
echo htmlentities($longText).'<br> ';
echo nl2br(htmlentities($longText)).'<br> ';
echo html_entity_decode('&lt;b&gt;RUA&lt;/b&gt;&gt;');

// https://www.php.net/manual/en/ref.strings.php