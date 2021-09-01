<?php

$url = 'https://jsonplaceholder.typicode.com/users';

// Sample example to get data.

//$resource = curl_init($url);
//curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);
//$usersJSON = curl_exec($resource);
//$info = curl_getinfo($resource);
//$code = curl_getinfo($resource, CURLINFO_HTTP_CODE);
//echo $code;
//echo '<br>';
//echo $usersJSON;
//echo '<pre>';
//var_dump($info);
//echo '<pre>';
//
//echo $code;
//curl_close($resource);
//

//// Get response status code
//$responseCode = curl_getinfo($resource, CURLINFO_HTTP_CODE);
//echo $responseCode;

// Create User
$user = [
    'name' => 'John Doe',
    'username' => 'john',
    'email' => 'john@example.com'
];

$ch = curl_init($url);
curl_setopt_array($ch, [
    CURLOPT_POST => true,
//    CURLOPT_URL => $url,
    CURLOPT_POSTFIELDS => json_encode($user),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => array('Content-Type: application/json')
]);
$result = curl_exec($ch);
curl_close($ch);
var_dump ($result);