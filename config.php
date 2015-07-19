<?php

    /**
     * Configuration file for the package
     */
    return array(
        
        /**
         * Drivers that are autoloaded with the package, first one is always default one
         */
        'drivers' => array('filesystem', 'mysql'),


        /**
         * Mysql driver configuration (assuming we already have a connection)
         * Default fields are: event_name, event_performer, event_subject, event_time
         * Custom fields are read from 'mysql_fields' array
         */
        'mysql_table' => 'logs',
        'mysql_fields' => array(),


        /**
         * Filesystem driver configuration 
         */
        'log_file_path' => './logs/test.log',


        /**
         * Time format that date/time will be written in
         */
        'time_format' => 'Y-m-d H:i:s'
    );

?>