<?php

    require_once dirname(__FILE__).'/language.php';

    class Settings{
        
        private $language = "";
        
        public function __construct(){
            $this->language = new Language();
            
            add_action('admin_menu', array( $this, 'createPage' ) );
        }
        
        public function createPage(){
            add_menu_page(
                "WP Photo Credit",
                "WP Photo Credit",
                "manage_options",
                "wp_photocredit",
                array( $this, 'showPage' ),
                '',
                100
            );
        }
        
        public function showPage(){
            $template = file_get_contents( dirname(__FILE__).'/../templates/settings.html');
            
            $template = str_replace("{%custom_css%}", $this->language->getText("custom_css"), $template );
            $template = str_replace("{%download%}", $this->language->getText("download"), $template );
            $template = str_replace("{%example_url%}",plugins_url()."/WP-Photo-Credits/examples/style.css", $template );
            
            echo $template;
        }
    }

?>