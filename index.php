<?php 
    // Start component
    include_once 'bootstrap.php';

    // Dummy test (default driver)
    \app\log\EventLogger::log('New comment', 'John Doe', 'some subject', array('content' => 'Hello there'));

    // Dummy test (injected driver)
    // EventLogger::log('New comment', 'John Doe', 'some subject', array('content' => 'Hello there'), new SomeDriver($config));
?>