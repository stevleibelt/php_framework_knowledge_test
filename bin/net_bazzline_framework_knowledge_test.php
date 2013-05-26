#!/usr/bin/php
<?php
/**
 * @author stev leibelt
 * @since 2013-05-26
 */

chdir(realpath(getcwd()));

require 'vendor/autoload.php';

//autloader for development
if (file_exists('src/Net/Bazzline/KnowledgeTest/basicAutoloader.php')) {
    echo 'Development mode.' . PHP_EOL;
    echo 'Loading autoloaders' . PHP_EOL;

    require 'src/Net/Bazzline/KnowledgeTest/basicAutoloader.php';
}

$application = new \Net\Bazzline\KnowledgeTest\Application\CliApplication();
$application->run();
