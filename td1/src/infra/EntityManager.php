<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require __DIR__ . '/../../vendor/autoload.php';
$isDevMode = true;
$config = ORMSetup::createXMLMetadataConfiguration([__DIR__ . '/mapping'], $isDevMode);

$dbParams = [
    'driver' => 'pdo_pgsql',
    'host'   => 'praticien.db',
    'user'   => 'prati',
    'password' => 'prati',
    'dbname' => 'prati',
];

$connection = DriverManager::getConnection($dbParams, $config);
$entityManager = new EntityManager($connection, $config);
