#!/usr/bin/env php
<?php

if (!$loader = include __DIR__ . '/../vendor/autoload.php') {
    die('You must set up the project dependencies.');
}

$app = new \Console\Application('Combatant Console');
$app->command(new \Console\Command\Simulator());
$app->run();
