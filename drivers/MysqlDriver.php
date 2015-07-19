<?php 
    namespace app\log;
    /**
     * Logging implementation using MySQL database approach 
     */
    class MysqlDriver implements ILogStore
    {   
        /**
         * Instance init using component configuration (assuming we already have connection)
         * @param Array $config configuration values
         */
        public function __construct(Array $config) {
            // TODO: load config values to instance variables, bind to propper table fields etc.
        }
        
        /** 
         * Method that writes log info to mysql table row
         * @param  String $name Event name
         * @param  String $performer Event performer
         * @param  String $subject Event subject
         * @param  Array|array $customData custom metadata
         * @return boolean depending on result
         */
        public function write($name, $performer, $subject, $customData = array())
        {
            // TODO: use system's mysql implementation to do insert query (mysqli, PDO, custom, ...)
        }
    }
?>