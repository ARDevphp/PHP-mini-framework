<?php

declare(strict_types=1);

spl_autoload_register(function ($classname) {
    $file = __DIR__ . '\\' . $classname . '.php';

    $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);

    if (file_exists($file)) {
        include $file;
    }
});

