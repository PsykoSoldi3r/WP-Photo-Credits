<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    class WPObject{
        
        public $post_id;
        
        public function __construct( $post_id ){
            $this->post_id = $post_id;
        }
        
        public function getMetaData( $key ){
            return get_post_meta( $this->post_id, Globals::$METADATA_PREFIX.$key);
        }
        
        public function updateMetaData( $key, $value ){
            update_post_meta( $this->post_id, Globals::$METADATA_PREFIX.$key, $value);
        }
        
    }

