<?php
    class iptPostTypes {
        public function __construct() {
            $this->post_types = [
                [
                    'slug' => 'job',
                    'name' => 'Job',
                    'plural' => 'Jobs'
                ],
                [
                    'slug' => 'project',
                    'name' => 'Project',
                    'plural' => 'Projects'
                ],
            ];
            add_action( 'init', [ $this, 'process' ] );
        }

        public function process() {
            error_log('running');
            foreach($this->post_types as $post_type) {
                $this->register($post_type);
            }
        }

        /**
         * Register the post type
         * @param array $post_type
         */

        public function register(array $post_type) {
            register_post_type( $post_type['slug'], array(
                'labels'                => array(
                    'name'                  => __( $post_type['slug'], 'sf' ),
                    'singular_name'         => __( $post_type['name'], 'sf' ),
                    'menu_name'             => __( $post_type['plural'], 'sf' ),
                ),
                'public'                => true,
                'hierarchical'          => true,
                'show_ui'               => true,
                'show_in_nav_menus'     => true,
                'supports'              => array( 'title', 'editor', 'thumbnail', 'post-formats' , 'page-attributes' , 'revisions'),
                'has_archive'           => false,
                'rewrite'               => array( 'slug' => $post_type['slug'], 'with_front' => false ),
                'query_var'             => true,
                'menu_icon'             => 'dashicons-application-alt',
                'show_in_rest'          => true,
                'rest_base'             => $post_type['slug'],
                'rest_controller_class' => 'WP_REST_Posts_Controller',
                'show_in_menu' => true
            ) );
        }
    }