<?php
spl_autoload_register(function ($className) {
    $path = null;
    if (file_exists('./sys/classes/' . $className . '.php')) {
        $path = './sys/classes/' . $className . '.php';
    } elseif (preg_match('|^(?:[A-Z][a-z]+)+Controller$|', $className)) {
        $path = './app/controllers/' . $className . '.php';
    } elseif (preg_match('|^(?:[A-Z][a-z]+)+Model$|', $className)) {
        $path = './app/models/' . $className . '.php';
    } elseif ($className === 'Config') {
        $path = './sys/Config.php';
    } else {
        die('AUTOLOAD: Class not found.');
    }
    if (file_exists($path)) {
        require_once $path;
        return true;
    }
    die('AUTOLOAD: File not found.');
});
