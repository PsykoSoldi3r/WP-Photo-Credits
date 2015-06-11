<?php

    /*
    Plugin Name: WP Photo Credits
    Plugin URI: http://www.yourpluginurlhere.com/
    Version: 1.0
    Author: Joey Kamsteeg
    Description: Add Photo Credits to images
    */

    require_once dirname(__FILE__).'/classes/globals.php';
    require_once dirname(__FILE__).'/classes/form.php';

    class PhotoCredits{
        
        private $form = null;
        
        public function __construct(){
            $this->createForm();
        }
        
        private function createForm(){
            $this->form = new Form();
        }
    }
    
    new PhotoCredits();
?>
