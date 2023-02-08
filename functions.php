<?php
/**
 * Cosa Theme
 * Function and definitions
 * 
 * @package consa
 */
 

 if ( ! function_exists( 'consa_setup' ) ) {

    function consa_setup(){

        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('post-formats',
            array(
                'link',
                'aside',
                'gallery',
                'image',
                'quote',
                'status',
                'video',
                'audio',
                'chat',
            )
        );
        add_theme_support(
            'custom-spacing', array(
                'padding' => true,
                'margin' => true,
            )
        );

        register_nav_menus(
            array(
                'primary' => esc_html__('Primary Menu', 'consa'),
                'footer' => esc_html__('Footer Menu', 'consa'),
            )
        );


        // Block editor support
        add_theme_support('align-wide');
        add_theme_support('editor-styles');
        add_theme_support('wp-block-styles');
        add_theme_support('responsive-embeds');

        // Add support for editor styles.
        add_editor_style();

    }
 }
 add_action('after_setup_theme', 'consa_setup');

 /**
  * Register widget area.
  */

  function consa_widgets_init(){
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'consa'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'consa'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
        )
    );
  }
  add_action('widgets_init', 'consa_widgets_init');

/**
 * Enqueue scripts and styles.
 * 
 */
 function consa_enqueue_scripts(){
    /**
     * Register styles
     */

    // Theme style
    wp_register_style('consa-style', get_template_directory_uri() . '/assets/css/style.css', array(), false, 'all');

    // Bootstrap style
    wp_register_style('bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), false, 'all');

    // Responsive style
    wp_register_style('responsive-style', get_template_directory_uri() . '/assets/css/responsive.css', array(), false, 'all');

    // Scroollbar style
    wp_register_style('scrollbar-style', get_template_directory_uri() . '/assets/css/jquery.mCustomScrollbar.min.css', array(), false, 'all');

    // Owl carousel style
    wp_register_style('owl-carousel-style', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), false, 'all');

    // Google fonts
    wp_register_style('google-fonts', 'https://fonts.googleapis.com/css?family=Poppins:400,700|Roboto:400,700&display=swap', array(), false, 'all');

    /**
     * Register scripts
     */
    // Popper script
    wp_register_script('popper-script', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), false, true);

    // Boostrap bundle script
    wp_register_script('bootstrap-bundle-script', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), false, true);

    // Plugins script
    wp_register_script('plugins-script', get_template_directory_uri() . '/assets/js/plugins.js', array('jquery'), false, true);

    // Scrollbar script
    wp_register_script('scrollbar-script', get_template_directory_uri() . '/assets/js/jquery.mCustomScrollbar.concat.min.js', array('jquery'), false, true);

    // Custom script
    wp_register_script('custom-script', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), false, true);

    // Owl carousel script
    wp_register_script('owl-carousel-script', get_template_directory_uri(). '/assets/js/owl.carousel.min.js', array('jquery'), false, true);

    /**
     * Enqueue styles
     */

    wp_enqueue_style('bootstrap-style');
    wp_enqueue_style('consa-style');
    wp_enqueue_style('google-fonts');
    wp_enqueue_style('responsive-style');
    wp_enqueue_style('scrollbar-style');
    wp_enqueue_style('owl-carousel-style');

    /**
     * Enqueue scripts
     */
    wp_enqueue_script('popper-script');
    wp_enqueue_script('bootstrap-bundle-script');
    wp_enqueue_script('plugins-script');
    wp_enqueue_script('scrollbar-script');
    wp_enqueue_script('custom-script');
    wp_enqueue_script('owl-carousel-script');

 }
 add_action('wp_enqueue_scripts', 'consa_enqueue_scripts');

 /**
  * Consa Theme Custom post type
  * Add custom taxonomy 
  */

  function consa_custom_post_types() {

    // Services post type
    $serives_texonomy_args = array(
        'labels' => array(
            'name' => 'Types',
            'singular_name' => 'Role',
            'add_new_item' => 'Add Role',
            'new_item_name' => 'New Role',
            'edit_item' => 'Edit Role',
            'update_item' => 'Update Role',
            'all_items' => 'All Types',
            'search_items' => 'Search Types',
            'parent_item' => 'Parent Role',
            'menu_name' => 'Types',
            'back_to_items' => '← Back to Types',
        ),
        'public' => true,
        'hierarchical' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_rest' => true,
    );

    $services_labels = array(
        'name' => 'Services',
        'singular_name' => 'Service',
        'add_new' => 'Add New service',
        'add_new_item' => 'Add New service',
        'edit_item' => 'Edit service',
        'new_item' => 'New service',
        'all_items' => 'All services',
        'view_item' => 'View service',
        'search_items' => 'Search services',
        'not_found' => 'No Services found',
        'not_found_in_trash' => 'No Services found in Trash',
        'parent_item_colon' => ',',
        'menu_name' => 'Services'
    );

    $services_args = array(
        'labels' => $services_labels,
        'description' => 'Holds our Services and Service specific data',
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'has_archive' => true,
        'hierarchical' => false,
        'menu_icon' => 'dashicons-businessman',
        'show_in_rest' => true,
    );


    // Events post type
    $events_labels = array(
        'name' => 'Events',
        'singular_name' => 'Event',
        'add_new' => 'Add New Event',
        'add_new_item' => 'Add New Event',
        'edit_item' => 'Edit Event',
        'new_item' => 'New Event',
        'all_items' => 'All Events',
        'view_item' => 'View Event',
        'search_items' => 'Search Events',
        'not_found' => 'No Events found',
        'not_found_in_trash' => 'No Events found in Trash',
        'parent_item_colon' => ',',
        'menu_name' => 'Events'
    );
    
    $events_args = array(
        'labels' => $events_labels,
        'description' => 'Holds our Events and Event specific data',
        'public' => true,
        'menu_position' => 6,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'has_archive' => true,
        'hierarchical' => false,
        'menu_icon' => 'dashicons-calendar-alt',
        'show_in_rest' => true,
    );

    register_post_type('services', $services_args);
    register_post_type('events', $events_args);
    register_taxonomy('types', array('services'), $serives_texonomy_args);

  }
  add_action('init', 'consa_custom_post_types');
  
  