<?php 
    namespace app\log;
    
    /**
    * Main class for logging events
    * Uses injected or default drivers for storage implementation
    */
    class EventLogger 
    {
        protected static $driver;

        /** 
         * Log method triggers driver to write log line
         * @param  String $name Event name
         * @param  String $performer Event performer
         * @param  String $subject Event subject
         * @param  Array|array $customData optional custom metadata
         * @param  ILogStore|null $driver optional driver to log with
         */
        public static function log($name, $performer, $subject, Array $customData = array(), ILogStore $driver = null)
        {
            if ($driver) {
                static::setDriver($driver);
            }

            try {
                static::$driver->write($name, $performer, $subject, $customData);
            } catch (Exception $e) {
                // Do something with caught exception (eg notify or dump error)
                echo $e->getMessage();
            }
        }

        /**
         * @param ILogStore $d driver to be set
         */
        public static function setDriver(ILogStore $d)
        {
            static::$driver = $d;
        }

        /**
         * @return ILogStore current driver
         */
        public static function getDriver()
        {
            return static::$driver;
        }
    }
?>