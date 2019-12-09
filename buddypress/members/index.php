<?php
/**
 * BuddyPress Members Directory
 *
 * @version 3.0.0
 */

$user = wp_get_current_user();
$user_ID = $user->ID;	

?>

<?php get_template_part( '/template-parts/bp-user-menu' ); ?>

<div class="container pagesection50">
<?php get_template_part( '/template-parts/communitycomingsoon-large' ); ?>
</div>