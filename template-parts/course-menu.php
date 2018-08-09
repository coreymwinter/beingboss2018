<div class="user-menu-bar">
	<div class="container">
		<div class="course-menu-container">
			<div class="row">
				<div class="col-md-6 vertcenter">

					<?php 

						$current_user = wp_get_current_user();
						$post_id = get_the_ID();
						$post_slug = get_post_field( 'post_name', get_post() );

					?>
					<ul class="course-menu">
						<?php if ( is_user_logged_in() ) { ?>
							<li><a href="/dashboard">DASHBOARD</a><li>
							<li><a href="/members/<?php echo $current_user->user_login; ?>/courses">MY COURSES</a><li>
						<?php } ?>
						<?php if ( $post_id == '12070' ) { ?>
							<li><a href="/groups/<?php echo $post_slug; ?>/forum/">FORUM</a><li>
							<li><a href="/groups/<?php echo $post_slug; ?>/members/">MEMBERS</a><li>
						<?php } ?>
						<?php if ( is_user_logged_in() ) { ?>
							<li><a href="/members/<?php echo $current_user->user_login; ?>/settings/">SETTINGS</a><li>
						<?php } ?>
					</ul>
				</div>

				<div class="col-md-6 vertcenter" style="text-align: right;">
					<?php echo do_shortcode('[uo_breadcrumbs]'); ?>
				</div>

			</div>
		</div>
	</div>
</div>

