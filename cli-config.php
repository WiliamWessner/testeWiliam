<?php
// cli-config.php
require_once "teste.php";

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);