<?php

    /*
    Plugin Name: WP Photo Credits
    Plugin URI: https://github.com/PsykoSoldi3r/WP-Photo-Credits
    Version: 1.0
    Author: Joey Kamsteeg
    Description: Add Photo Credits to images
    */

    require_once dirname(__FILE__).'/classes/globals.php';
    require_once dirname(__FILE__).'/classes/form.php';
    require_once dirname(__FILE__).'/classes/attachment.php';
    require_once dirname(__FILE__).'/classes/language.php';
    require_once dirname(__FILE__).'/classes/settings.php';

    class PhotoCredits{
        
        private $form = null;
        private $settings = null;
        
        public function __construct(){
            $this->createForm();
            $this->createSettings();
            
            add_action('get_image_tag', array( $this, 'imageTag' ), 0, 4 );
        }
        
        private function createForm(){
            $this->form = new Form();
        }
        
        private function createSettings(){
            $this->settings = new Settings();
        }
        
        public function imageTag( $html, $id, $alt, $title ){
            $attachment = new Attachment( $id );
            $language = new Language();
            
            if( $attachment->credit_name == null ){
                return $html;   
            }
            
            if( $attachment->credit_url == null ) {
                $attachment->credit_url = "#";
            }
            
            $credit_holder = "<a href=".$attachment->credit_url." target='_blank'>";
            $credit = "<div class='".Globals::$STYLE_PREFIX."creditname'>".$language->getText("credit_name_post")." ".$attachment->credit_name."</div>";
            $credit_holder_close = "</a>";
            
            return "<div class='".Globals::$STYLE_PREFIX."creditholder'>".
                   $html.
                   $credit_holder.$credit.$credit_holder_close.
                   "</div>";
        }
    }
    
    new PhotoCredits();
?>
