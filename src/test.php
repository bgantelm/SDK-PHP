<?php
use client\Client;

require 'client.php';

$token = '4d416c43f41a1fa809db7932cae854c1';
$text = 'What is the weather in London tomorrow? And in Paris?';
$file = './src/test.wav';
//$language = 'en';

$client = new Client($token, $language);

$lol = $client->fileRequest($file);
 ?>
