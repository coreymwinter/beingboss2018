<?php
/**
 * BP Nouveau Default user's front template.
 *
 * @since 3.0.0
 * @version 3.1.0
 */
?>

<div class="member-front-page">

	<?php if ( ! is_customize_preview() && bp_current_user_can( 'bp_moderate' ) && ! is_active_sidebar( 'sidebar-buddypress-members' ) ) : ?>

		<div class="bp-feedback custom-homepage-info info">
			<strong><?php esc_html_e( 'Manage the members default front page', 'buddypress' ); ?></strong>
			<button type="button" class="bp-tooltip" data-bp-tooltip="<?php echo esc_attr_x( 'Close', 'button', 'buddypress' ); ?>" aria-label="<?php esc_attr_e( 'Close this notice', 'buddypress' ); ?>" data-bp-close="remove"><span class="dashicons dashicons-dismiss" aria-hidden="true"></span></button><br/>
			<?php
			printf(
				esc_html__( 'You can set the preferences of the %1$s or add %2$s to it.', 'buddypress' ),
				bp_nouveau_members_get_customizer_option_link(),
				bp_nouveau_members_get_customizer_widgets_link()
			);
			?>
		</div>

	<?php endif; ?>

		<div class="member-description">

			<h2>BIO</h2>
			<div class="row">
				<div class="col-md-8">
					<div class="profile-bio">
						<?php $user_bio = wpautop(xprofile_get_field_data( 'Bio', bp_displayed_user_id() )); ?>
					
						<?php if (empty ($user_bio) ) { ?>
							<p>This boss needs no introduction.</p>
						<?php } else { ?>
							<?php echo $user_bio; ?>
						<?php } ?>

						<?php if ( bp_is_my_profile() && empty ( $user_bio )) { ?>
							<a href="<?php echo bp_loggedin_user_domain() . 'profile/edit/'; ?>" class="button-yellow">Complete Your Profile</a>
						<?php } ?>
					</div>
				</div>
				<div class="col-md-4">
					<div class="profile-user">
						<?php 
							$user_id = bp_displayed_user_id();
							$user_info = get_userdata($user_id);
							$user_chosen_name = xprofile_get_field_data( 'Name', bp_displayed_user_id() );
						?>

						<?php echo get_avatar( bp_displayed_user_id(), 115, $default, $alt ); ?>

						<?php if ( !empty ($user_chosen_name) ) { ?>
							<h2 class="center"><?php echo $user_chosen_name ?></h2>
						<?php } else { ?>
							<h2 class="center"><?php echo $user_info->first_name . " " . $user_info->last_name . "\n"; ?></h2>
						<?php } ?>
						<p class="center italic padbot0"><?php echo xprofile_get_field_data( 'Job Title', bp_displayed_user_id() ); ?></p>
						<p class="center brandon"><?php echo xprofile_get_field_data( 'Public Location', bp_displayed_user_id() ); ?></p>
		
						<div style="margin-top: 15px;">
							<?php if ( bp_is_my_profile() ) { ?>
								<a href="<?php echo bp_loggedin_user_domain() . 'profile/edit/'; ?>" class="button-yellow">Edit profile</a>
							<?php } else { ?>
								<p class="button center" style="opacity: 0.5;">PRIVATE MESSAGE</p>
							<?php } ?>

							<!-- <?php hibuddy_send_private_message_button(); ?> -->
		
							<div style="margin-top: 15px;"><?php get_template_part( '/template-parts/communitycomingsoon' ); ?></div>

						</div>
					</div>
				</div>
			</div>

			

		</div><!-- .member-description -->

	<?php if ( is_active_sidebar( 'sidebar-buddypress-members' ) ) : ?>

		<div id="member-front-widgets" class="bp-sidebar bp-widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-buddypress-members' ); ?>
		</div><!-- .bp-sidebar.bp-widget-area -->

	<?php endif; ?>

</div>
