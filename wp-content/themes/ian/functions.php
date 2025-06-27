<?php

    $theme_dir = get_template_directory();
    // wordpress adjustments
    add_theme_support( 'post-thumbnails' );
    wp_deregister_script('jquery');
    // functionality
    include_once($theme_dir . '/inc/enqueue.php');
    include_once($theme_dir . '/inc/post-types.php');

    // run functionality
    new iptEnqueue();
    new iptPostTypes();

    


    

