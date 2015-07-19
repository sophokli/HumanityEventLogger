<?php
    use app\log\EventLogger;

    /**
     * This file is used for initialization and loading necessary component files (based on configuration)
     */
    $config = include 'config.php';

    // Load driver interface
    include_once 'drivers' . DIRECTORY_SEPARATOR . 'ILogStore.php';

    // Load main log class
    include_once 'EventLogger.php';

    // Load all driver types
    foreach ($config['drivers'] as $driver) {
        include_once 'drivers' . DIRECTORY_SEPARATOR .  ucfirst($driver) . 'Driver.php';
    }
    
    // Set default driver
    $default_driver = '\\app\\log\\' . ucfirst($config['drivers'][0]).'Driver';
    EventLogger::setDriver(new $default_driver($config));
?>