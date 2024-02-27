<?php
// bootstrap.php
// bootstrap.php

require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\Annotations\AnnotationReader;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


$paths = [__DIR__ . "/src/Entity"];
$isDevMode = true;

$dbParams = array(
    "dbname" => "chaises_pliees",
    "user" => "root",
    "password" => "",
    "host" => "localhost",
    "driver" => "pdo_mysql",
    "charset"=>"utf8"
);

$config = Setup::createConfiguration($isDevMode);
$config->setMetadataDriverImpl(
    new Doctrine\ORM\Mapping\Driver\AnnotationDriver(
        new AnnotationReader(),
        $paths
    )
);

$entityManager = EntityManager::create($dbParams, $config);

$loader = new FilesystemLoader(__DIR__ . '/template');
$twig = new Environment($loader);

?>