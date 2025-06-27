<?php
    class iptEnqueue {
        public function __construct() {
            $this->dist_uri = get_template_directory_uri().'/dist/';
            $this->dist_path = get_template_directory().'/dist/';
            $this->css = 'bundle.css';
            $this->js = 'bundle.js';
            add_action( 'wp_enqueue_scripts', [ $this, 'register' ] );
        }

        /**
         * Single function to register
         */

        public function register() {
            $this->styles();
            $this->scripts();
        }

        /**
         * Enqueue styles
         */

        public function styles() {
            wp_enqueue_style(
                'base',
                $this->dist_uri.$this->css,
                [],
                filemtime($this->dist_path.$this->css),
                'all'
            );
        }

        /**
         * Enqueue scripts
         */

        public function scripts() {
            wp_register_script('ipt_base', $this->dist_uri.$this->js);
            wp_enqueue_script(
                'ipt_base', 
                $this->dist_uri.$this->js, 
                [], 
                filemtime($this->dist_path.$this->js), 
                []
            );
            wp_localize_script(
                'ipt_base', 
                'ipt_base', 
                [
                    'json_base' => get_home_url().'/wp-json/',
                ]
            );
        }
    }
    
    
