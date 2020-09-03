<?php
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}


function add_theme_scripts() {
  wp_enqueue_style( 'theme-styles', get_stylesheet_directory_uri() . '/style.css', array(), filemtime( get_stylesheet_directory() . '/style.css' ) );
  
  //wp_enqueue_script( 'custombb', get_stylesheet_directory_uri() . '/js/custombb.js', array(), false);

}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );




/**
 * Register our footer widgetized areas.
 *
 */
function footer_widgets_init() {

	register_sidebar( array(
		'name'          => 'Footer Menu 1',
		'id'            => 'footer_menu_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Footer Menu 2',
		'id'            => 'footer_menu_2',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Footer Menu 3',
		'id'            => 'footer_menu_3',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Footer Copyright',
		'id'            => 'footer_copyright',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Course Navigation',
		'id'            => 'course_navigation',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Dashboard - 1',
		'id'            => 'dashboard_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Dashboard - 2',
		'id'            => 'dashboard_2',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Dashboard - 3',
		'id'            => 'dashboard_3',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Dashboard - 4',
		'id'            => 'dashboard_4',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Dashboard - 4-2',
		'id'            => 'dashboard_4_2',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Dashboard - 5',
		'id'            => 'dashboard_5',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Lesson Sidebar',
		'id'            => 'lesson_sidebar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'footer_widgets_init' );



add_filter( 'body_class', function( $classes ) {
    return array_merge( $classes, array( 'drawer drawer--right' ) );
} );





function um_filter_dynamic_post_args( $post_args , $menu_item_id ){
 
    //Target menu item 562
    if( $menu_item_id == 12942 ){
 
        //Change orderby to random
        $post_args['orderby'] = 'rand';
    }
 
    return $post_args;
 
}
add_filter( 'ubermenu_dynamic_posts_args' , 'um_filter_dynamic_post_args' , 10 , 2 );


function my_uber_add_subcontent( $content , $post , $item_id ){
 
   $content.= '<span class="ubermenu-target-description ubermenu-target-text">';
   $content.= $post->post_excerpt;
   $content.= '</span>';
 
   return $content;
}
add_filter( 'ubermenu_dp_subcontent' , 'my_uber_add_subcontent' , 10 , 3 );





/*function replace_affiliate_register_text( $content ){
 
   $content.= 'test5';
 
   return $content;
}
apply_filter( 'yith_wcaf_registration_form_become_affiliate_text', 'replace_affiliate_register_text' );*/



// Cut Jack's boasting
add_filter( 'yith_wcaf_registration_form_become_affiliate_text' , 'replace_affiliate_register_text');
function replace_affiliate_register_text($boast) {
  // Append another phrase at the end of his boast
  $boast = get_template_part( '/template-parts/affiliate-terms' );
  return $boast;
}




add_action( 'gform_user_registered', 'wpc_gravity_registration_autologin',  10, 4 );
/**
 * Auto login after registration.
 */
function wpc_gravity_registration_autologin( $user_id, $user_config, $entry, $password ) {
	$user = get_userdata( $user_id );
	$user_login = $user->user_login;
	$user_password = $password;
       $user->set_role(get_option('default_role', 'subscriber'));

    wp_signon( array(
		'user_login' => $user_login,
		'user_password' =>  $user_password,
		'remember' => false

    ) );
}




// This is your function, you can name it anything you want
function affiliate_dashboard_text() { ?>
    <?php echo get_template_part( '/template-parts/affiliate-landing' ); ?>
<?php }

// This is the action function that outputs the function above into the theme hook under the logo
// Total version 3.5.3+ required!!
add_action( 'yith_wcaf_before_dashboard_summary', 'affiliate_dashboard_text', 10 );







add_filter( 'template_include', 'custom_single_product_template_include', 50, 1 );
function custom_single_product_template_include( $template ) {
    if ( is_singular('product') && (has_term( 'Membership', 'product_cat')) ) {
        $template = get_stylesheet_directory() . '/single-product-14028.php';
    } 
    return $template;
}






?>