<?php
	

	function add_my_script() {	
		wp_enqueue_script('jquery.min', get_template_directory_uri() . '/js/jquery.min.js', array('jquery') );	
        wp_enqueue_script('flickity', get_template_directory_uri() . '/js/flickity.pkgd.js', array('jquery') );
		wp_enqueue_script('custom', get_template_directory_uri(). '/js/custom.js', array('jquery') );		
	}
	add_action( 'wp_enqueue_scripts', 'add_my_script' );
	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	if ( !is_admin() ) {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"), false);
	   wp_enqueue_script('jquery');
	}
	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
	// Declare sidebar widget zone
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h3>',
    		'after_title'   => '</h3>'
    	));
    }
add_theme_support( 'post-thumbnails' );
add_action( 'after_setup_theme', 'wp_biowave' );
    if ( ! function_exists( 'wp_biowave' ) ):
        function wp_biowave() {  
            register_nav_menu( 'primary', __( 'Primary navigation', 'biowave' ) );
             register_nav_menu( 'secondary', __( 'Footer navigation', 'biowave' ) );
        } endif;
	function get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&sol;&nbsp;&nbsp;";
        the_category(' &bull; ');
            if (is_single()) {
                echo " &nbsp;&nbsp;&sol;&nbsp;&nbsp; ";
                  the_time('F d, Y'); 
            }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&sol;&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&sol;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}

function biowave_customize_register($wp_customize){
    
    $wp_customize->add_section('biowave_footer', array(
        'title'    => __('Footer Option', 'biowave'),
        'priority' => 120,
    ));
    $wp_customize->add_setting( 'footer-logo' ); 
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'footer-logo',
            array(
                'label' => 'Footer Logo',
                'section' => 'biowave_footer',
                'settings' => 'footer-logo'
            )
        )
    );
    $wp_customize->add_setting('footer_contact',
    array(
        'default' => ' ',
    ));
    $wp_customize->add_control('footer_contact',
        array(
            'label' => 'Contact details',
            'section' => 'biowave_footer',
            'type' => 'text',
    ));
    $wp_customize->add_setting('footer_email',
    array(
        'default' => 'Email Id',
    ));
    $wp_customize->add_control('footer_email',
        array(
            'label' => 'Email',
            'section' => 'biowave_footer',
            'type' => 'email',
    ));
    $wp_customize->add_setting('copyright_textbox',
    array(
        'default' => 'Default copyright text',
    ));
    $wp_customize->add_control('copyright_textbox',
        array(
            'label' => 'Copyright text',
            'section' => 'biowave_footer',
            'type' => 'text',
    ));
    
    /* social icon */
     $wp_customize->add_section('biowave_social', array(
        'title'    => __('Social Links', 'biowave'),
        'priority' => 120,
    ));
    $wp_customize->add_setting('facebook_link',
    array(
        'default' => '',
    ));
    $wp_customize->add_control('facebook_link',
        array(
            'label' => 'Facebook Link',
            'section' => 'biowave_social',
            'type' => 'url',
    ));
    $wp_customize->add_setting('twitter_link',
    array(
        'default' => '',
    ));
    $wp_customize->add_control('twitter_link',
        array(
            'label' => 'Twitter Link',
            'section' => 'biowave_social',
            'type' => 'url',
    ));
    $wp_customize->add_setting('youtube_link',
    array(
        'default' => '',
    ));
    $wp_customize->add_control('youtube_link',
        array(
            'label' => 'Youtube Link',
            'section' => 'biowave_social',
            'type' => 'url',
    ));
    $wp_customize->add_setting('instagram_link',
    array(
        'default' => '',
    ));
    $wp_customize->add_control('instagram_link',
        array(
            'label' => 'Instagram Link',
            'section' => 'biowave_social',
            'type' => 'url',
    ));

}
add_action('customize_register', 'biowave_customize_register');

//Admin logo
        function my_login_logo() { ?>
        <style type="text/css">
            #login h1 a, .login h1 a {
                background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
                height: 60px;
                width:200px;
                background-size: 200px 60px;
                background-repeat: no-repeat;
                padding-bottom: 30px;
            }
        </style>  
        
        
    <?php }
    add_action( 'login_enqueue_scripts', 'my_login_logo' );
    //Admin logo url
    function my_login_logo_url() {
        return home_url();
    }
    add_filter( 'login_headerurl', 'my_login_logo_url' );
    //admin logo title
    function my_login_logo_url_title() {
        return 'Reconnoiter';
    }
    add_filter( 'login_headertitle', 'my_login_logo_url_title' );

    // Favicon
    function add_favicon() {
        $favicon_url = get_stylesheet_directory_uri() . '/favicon.ico';
        echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
    }
      
    // Now, just make sure that function runs when you're on the login page and admin pages  
    add_action('login_head', 'add_favicon');
    add_action('admin_head', 'add_favicon');

    // Remove wordpress logo from admin bar
    add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );

    function remove_wp_logo( $wp_admin_bar ) {
        $wp_admin_bar->remove_node( 'wp-logo' );
	}	
	add_theme_support( 'custom-logo' );

?>