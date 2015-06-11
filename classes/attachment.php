<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    require_once dirname(__FILE__).'/globals.php';
    require_once dirname(__FILE__).'/wpobject.php';

    class Attachment extends WPObject{
        
        public $credit_name = '';
        public $credit_url = '';
        
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