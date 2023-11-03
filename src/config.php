<?php

require_once "../../vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
$paths = [__DIR__."/src/Entity"];
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);

//Conexão com banco de dados
$params = [
    'url' => "mysql://root:@localhost/teste"
];

//Obter a instância da classe Entity Manager
$entityManager = EntityManager::create($params, $config);

define('URL', 'http://localhost/testewiliam');
