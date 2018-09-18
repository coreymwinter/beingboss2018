<?php 
			$notice_args = array(
					'post_type' => array( 'communitynotices' ),
					'posts_per_page' => 1,
			);
		
			$notice_query = new WP_Query( $notice_args );

			if ( $notice_query->have_posts() ) { ?>
				<div style="margin-bottom: 35px;">
				
					<?php while ($notice_query->have_posts()) {
						$notice_query->the_post();

						$noticeid = get_the_ID();
						$notice_bg_color = get_post_meta( $noticeid, 'bbcn_bg_color', true );
						$notice_text_color = get_post_meta( $noticeid, 'bbcn_text_color', true );
						$notice_header = get_post_meta( $noticeid, 'bbcn_header_text', true );
						$notice_link = get_post_meta( $noticeid, 'bbcn_link', true );
						$notice_label = get_post_meta( $noticeid, 'bbcn_link_label', true );
						$notice_summary = get_post_meta( $noticeid, 'bbcn_short_summary', true );
						$notice_button_color = get_post_meta( $noticeid, 'bbcn_button_color', true );
						$notice_modified_date = get_the_modified_date( 'm/d/y @ h:ma ', $noticeid );

					?>

					<div style="width: 100%; height: auto; padding: 30px; display: table; background-color: <?php echo $notice_bg_color; ?>;">
						<p style="color: <?php echo $notice_text_color; ?>;" class="giant lust"><?php echo $notice_header; ?></p>
						<p class="medium" style="color: <?php echo $notice_text_color; ?>;"><?php echo $notice_summary; ?></p>
						<p class="white italic small">Last updated <?php echo $notice_modified_date; ?></p>
						<?php if (!empty($notice_link)) { ?>
							<a class="center button-<?php echo $notice_button_color; ?>" href="<?php echo $notice_link; ?>"><?php echo $notice_label; ?></a>
						<?php } ?>

					</div>

					<?php } ?>

				</div>
		
			<?php } ?>	

		<?php wp_reset_postdata(); ?>