<?php

    class Content extends WPObject{
        
        public function __construct( $post_id ){            
            parent::__construct( $post_id );
            
            $this->load();
        }
        
        private function load(){
            $this->credit_name = $this->getMetaData('credit_name'); $this->credit_name = $this->credit_name[0];
            $this->credit_url = $this->getMetaData('credit_url'); $this->credit_url = $this->credit_url[0];
        }
        
        public function save(){
            $this->updateMetaData( 'credit_name', $this->credit_name, true );
            $this->updateMetaData( 'credit_url', $this->credit_url, true );
        }
    }

?>