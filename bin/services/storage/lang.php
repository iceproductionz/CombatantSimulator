<?php

// define some services
$container['services.storage.lang'] = function ($c) {
    return file_get_contents(__DIR__ . '/../../../config/lang.json');
};
