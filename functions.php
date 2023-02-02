<?php
/**
 * Cosa Theme
 * Function and definitions
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

  