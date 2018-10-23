<div class="dashboard-widget">
	<h3>MY PROGRESS</h3>
	<div class="widget-wrapper">
		<?php 
			$current_user = wp_get_current_user();
			$current_user_id = $current_user->ID;
			$current_user_name = $current_user->user_login;
			$current_points = get_user_meta($current_user_id, 'bbc_user_current_points', true);
			$rank_id = mycred_get_users_rank_id( $current_user_id, 'bossness');

			if ($current_points == "0") { ?>
				<p class="brandon fs22 padbot15">IT'S TIME TO LEVEL UP!</p>
				<p>This says something so clever about going and filling out that questionnaire.</p>
				<a class="button-yellow" href="/members/<?php echo $current_user_name; ?>/questionnaire">RECORD PROGRESS</a>
			<?php } else {
				if ( $rank_id == '12517' ) {
					echo '<p class="brandon fs16 padbot0">LEVEL 1: BRONZE</p>';
				}
				if ( $rank_id == '12518' ) {
				    echo '<p class="brandon fs16 padbot0">LEVEL 3: SILVER</p>';
				}
				if ( $rank_id == '12519' ) {
					echo '<p class="brandon fs16 padbot0">LEVEL 3: RAINBOW AF</p>';
				}
			
				echo do_shortcode('[mycred_users_rank_progress]'); 

				echo '<a class="button-yellow" href="#">RECORD PROGRESS</a>';
			}
		?>
	</div>
</div>