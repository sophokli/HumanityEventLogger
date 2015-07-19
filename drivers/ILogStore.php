<?php 
    namespace app\log;
    /**
     * This interface must be implemented by all storage drivers that are used within component
     */
    interface ILogStore 
    {
        public function write($name, $performer, $subject, $customData = array());

        public function __construct(Array $config);
    }
?>