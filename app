<?php
// application.php

require __DIR__. DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Symfony\Component\Console\Application as Application,
    \App\StringCapser as Capser;

$application = new Application('capser');

$application->add(new Capser());

$application->run();