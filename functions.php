<?php
    //require_once get_theme_file_path('inc/tgm.php');
    //require_once get_theme_file_path('inc/acf_mb.php');
    //require_once get_theme_file_path('inc/cmb2_mb.php');
?>
<?php
// if ( class_exists( 'Attachments' ) ) {
//     require_once get_theme_file_path("/lib/attachments.php");
// }

if ( site_url() == "http://demo.redoyit.com" ) {
    define( "VERSION", time() );
} else {
    define( "VERSION", wp_get_theme()->get( "Version" ) );
}


function portfolio_bootstrapping() {
    load_theme_textdomain( "portfolio" );
    add_theme_support( "post-thumbnails" );
    add_theme_support( "title-tag" );
    add_theme_support( 'html5', array( 'search-form' ) );
    $portfolio_custom_header_details = array(
        'header-text'        => true,
        'default-text-color' => '#222',
        'width'              => 1200,
        'height'             => 600,
        'flex-height'        => true,
        'flex-width'         => true,
    );
    add_theme_support( "custom-header", $portfolio_custom_header_details );

    $portfolio_custom_logo_defaults = array(
        "width"  => '100',
        "height" => '100'
    );
    add_theme_support( "custom-logo", $portfolio_custom_logo_defaults );

    add_theme_support("custom-background");

    register_nav_menu( "topmenu", __( "Top Menu", "portfolio" ) );
    register_nav_menu( "footermenu", __( "Footer Menu", "portfolio" ) );

    add_theme_support( "post-formats", array( "image", "quote", "video", "audio", "link" ) );

    add_image_size("portfolio-square",400,400,true); //center center
    add_image_size("portfolio-square-new1",401,401,array("left","top"));
    add_image_size("portfolio-square-new2",500,500,array("center","center"));
    add_image_size("portfolio-square-new3",600,600,array("right","center"));

}

add_action( "after_setup_theme", "portfolio_bootstrapping" );

function portfolio_assets() {
    //Enquee Theme CSS Style 
    wp_enqueue_style( "preconnect-googleapis", "//fonts.googleapis.com" );
    wp_enqueue_style( "preconnect-gstatic", "//fonts.gstatic.com" );
    wp_enqueue_style( "fonts", "//fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" );
    wp_enqueue_style( "line-awesome", "//maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" );
    wp_enqueue_style("bootstrap-style",get_template_directory_uri()."/assets/css/bootstrap.min.css");
    wp_enqueue_style("owl-carousel-style",get_template_directory_uri()."/assets/css/owl.carousel.min.css");
    wp_enqueue_style("owl-theme-style",get_template_directory_uri()."/assets/css/owl.theme.default.min.css");
    wp_enqueue_style("animate-style",get_template_directory_uri()."/assets/css/animate.min.css");
    wp_enqueue_style("smooth-scrollbar-style",get_template_directory_uri()."/assets/css/smooth-scrollbar.css");
    wp_enqueue_style("lightbox-style",get_template_directory_uri()."/assets/css/lightbox.min.css");
    wp_enqueue_style("portfolio-style",get_template_directory_uri()."/assets/css/style.css");
    wp_enqueue_style("responsive-style",get_template_directory_uri()."/assets/css/responsive.css");
    wp_enqueue_style( "dashicons" );
    wp_enqueue_style( "portfolio", get_stylesheet_uri(), VERSION );

    //Enquee Theme JS Scripts
    wp_enqueue_script("portfolio-jquery",get_template_directory_uri()."/assets/js/jquery.js", array(), VERSION, true );
    wp_enqueue_script("bootstrap-bundle",get_template_directory_uri()."/assets/js/bootstrap.bundle.min.js", array(), VERSION, true );
    wp_enqueue_script("owl-carousel",get_template_directory_uri()."/assets/js/owl.carousel.js", array(), VERSION, true );
    wp_enqueue_script("gsap",get_template_directory_uri()."/assets/js/gsap.min.js", array(), VERSION, true );
    wp_enqueue_script("ScrollTrigger",get_template_directory_uri()."/assets/js/ScrollTrigger.min.js", array(), VERSION, true );
    wp_enqueue_script("ScrollToPlugin",get_template_directory_uri()."/assets/js/ScrollToPlugin.min.js", array(), VERSION, true );
    wp_enqueue_script("lightbox",get_template_directory_uri()."/assets/js/lightbox.min.js", array(), VERSION, true );
    wp_enqueue_script("main",get_template_directory_uri()."/assets/js/main.js", array(), VERSION, true );
    wp_enqueue_script("ajax-form",get_template_directory_uri()."/assets/js/ajax-form.js", array(), VERSION, true );
    wp_enqueue_script("color",get_template_directory_uri()."/assets/js/color.js", array(), VERSION, true );
}
add_action( "wp_enqueue_scripts", "portfolio_assets" );

function portfolio_sidebar() {
    register_sidebar(
        array(
            'name'          => __( 'Single Post Sidebar', 'portfolio' ),
            'id'            => 'sidebar-1',
            'description'   => __( 'Right Sidebar', 'portfolio' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Footer Left', 'portfolio' ),
            'id'            => 'footer-left',
            'description'   => __( "Widgetized Area On The Left Side", 'portfolio' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '',
            'after_title'   => '',
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Footer Right', 'portfolio' ),
            'id'            => 'footer-right',
            'description'   => __( "Widgetized Area On The Right Side", 'portfolio' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '',
            'after_title'   => '',
        )
    );
}

add_action( "widgets_init", "portfolio_sidebar" );