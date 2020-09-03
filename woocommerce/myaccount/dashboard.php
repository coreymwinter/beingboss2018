<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<p>
	<?php
	printf(
		/* translators: 1: user display name 2: logout url */
		__( 'Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce' ),
		'<strong>' . esc_html( $current_user->display_name ) . '</strong>',
		esc_url( wc_logout_url() )
	);
	?>
</p>

<div class="wrapper dashboard">
	<div class="container dashboard-content">
		<div class="pagesection30">
			<?php
				$user = wp_get_current_user();
				$user_ID = $user->ID;	
				$user_name = $user->user_login;	
				$student_check = get_user_meta($user_ID, 'bbc_user_student_tag', true);
				$club_check = get_user_meta($user_ID, 'bbc_user_club_tag', true);

			/*<!-- if user has course but not community-->*/
			if ( !empty($student_check) && empty($club_check) ) {
				get_template_part( '/template-parts/dashboard/dashboard-course' );
			}

			/*<!-- if user has community but not course-->*/
			else if ( empty($student_check) && !empty($club_check) ) {
				get_template_part( '/template-parts/dashboard/dashboard-community' );
			}

			/*<!-- if user has course and community -->*/
			else if ( !empty($student_check) && !empty($club_check) ) {
				get_template_part( '/template-parts/dashboard/dashboard-all' );
			}

			/*<!-- if user is free -->*/
			else { 
				get_template_part( '/template-parts/dashboard/dashboard-free' );
			} ?>
		</div>
	</div>
</div>

<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
