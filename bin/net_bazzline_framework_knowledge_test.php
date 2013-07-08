#!/usr/bin/php
<?php
/**
 * @author stev leibelt
 * @since 2013-05-26
 */

chdir(realpath(getcwd()));

require 'vendor/autoload.php';

//autloader for development
if (file_exists('source/Net/Bazzline/KnowledgeTest/developmentAutoloader.php')) {
    echo 'Development mode.' . PHP_EOL;
    echo 'Loading autoloaders' . PHP_EOL;

    require 'source/Net/Bazzline/KnowledgeTest/developmentAutoloader.php';
}

$application = new \Net\Bazzline\KnowledgeTest\Application\CliApplication();
$application->run();
