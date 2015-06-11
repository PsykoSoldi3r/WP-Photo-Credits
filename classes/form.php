<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    
    require_once dirname(__FILE__).'/globals.php';
    require_once dirname(__FILE__).'/attachment.php';

    class Form{
        
        public function __construct(){ 
            add_filter('attachment_fields_to_edit', array( $this, 'registerMetadata'), null , 2);
            add_filter('attachment_fields_to_save', array( $this, 'saveMetadata'), null, 2 );
        }
        
        public function registerMetadata( $form_fields, $post ){
            $attachment = new Attachment( $post->ID );
            
            $form_fields[ Globals::$METADATA_PREFIX.'credit_name'] = array (
                "label" => __("Credit name" ),
                "input" => "text",
                "value" => $attachment->credit_name
            );
            
            $form_fields[ Globals::$METADATA_PREFIX.'credit_url'] = array (
                "label" => __("Credit URL"),
                "input" => "text",
                "value" => $attachment->credit_url
            );
            
            return $form_fields;
        }
        
        public function saveMetadata( $post, $attachmentNew ){
            $attachment = new Attachment( $post['ID'] );            
            
            if( isset( $attachmentNew[Globals::$METADATA_PREFIX.'credit_name'] ) ){
                $attachment->credit_name = $attachmentNew[Globals::$METADATA_PREFIX.'credit_name'];
            }
            
            if( isset( $attachmentNew[Globals::$METADATA_PREFIX.'credit_url'] ) ){
                $attachment->credit_url = $attachmentNew[Globals::$METADATA_PREFIX.'credit_url'];
            }
            
            $attachment->save();
        }
        
    }

?>