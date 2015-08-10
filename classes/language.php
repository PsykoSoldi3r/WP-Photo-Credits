<?php

    class Language {
        private $code = "";
        private $rawdata = "";
        private $data = "";
        
        public function __construct(){
            $this->code = get_bloginfo( 'language' );
            $this->loadFile();
        }
        
        private function loadFile(){
            $rawdata = file_get_contents( dirname(__FILE__)."/../data/language.json" );
            $this->rawdata = json_decode( $rawdata );
            
            $this->data = $this->rawdata->{ $this->getCode() };
        }
        
        public function getText( $key ){
            return $this->data->{$key};
        }
        
        public function getCode(){
            return $this->code;
        }
    }
?>