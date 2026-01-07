<?php

use MongoDB\Client;

require_once __DIR__ . '/../vendor/autoload.php';

$client = new Client("mongodb://mongo:27017");
$db = $client->chopizza;
