<?php
    namespace app\log;
    /**
     * Logging implementation using filesystem approach 
     */
    class FilesystemDriver implements ILogStore
    {
        private $path;
        private $timeFormat;

        /**
         * Instance init using component configuration
         * @param Array $config configuration values
         */
        public function __construct(Array $config) {
            $this->path       = $config['log_file_path'];
            $this->timeFormat = $config['time_format'];
        }

        /** 
         * Method that writes log line to file
         * @param  String $name Event name
         * @param  String $performer Event performer
         * @param  String $subject Event subject
         * @param  Array|array $customData custom metadata
         */
        public function write($name, $performer, $subject, $customData = array())
        {
            $line_data = array(
                'name'      => $name,
                'performer' => $performer,
                'subject'   => $subject
            );

            // Merge custom fields, key collision will be solved in favor of first array
            $line_data += $customData;

            $line = 'time : ' . date($this->timeFormat) . '; ';

            foreach ($line_data as $key => $value) {
                $line.= $key . ' : ' . $value . '; ';
            }
            
            $line .= "\n";

            // Do file write
            if (!file_put_contents($this->path, $line, FILE_APPEND)) {
                throw new Exception("Failed to write to file");
                
            }
        }
    }
?>