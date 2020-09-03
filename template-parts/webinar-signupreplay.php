<?php 
	$postid = get_the_ID();
	$webinar_main_title = get_post_meta( $postid, 'bbwebinar_main_title', true );
	$webinar_month = get_post_meta( $postid, 'bbwebinar_month', true ); 
	$webinar_day = get_post_meta( $postid, 'bbwebinar_day', true ); 
	$webinar_replay_video = get_post_meta( $postid, 'bbwebinar_replay_video', true ); 
	$webinar_box_title = get_post_meta( $postid, 'bbwebinar_subscribe_box_title', true );

	$webinar_full_everwebinar = get_post_meta( $postid, 'bbwebinar_everwebinar_full', true ); 
	$webinar_button_label = get_post_meta( $postid, 'bbwebinar_custom_button_label', true ); 
	$webinar_button_link = get_post_meta( $postid, 'bbwebinar_custom_button_link', true ); 
	$webinar_signup_form = get_post_meta( $postid, 'bbwebinar_signup_form', true ); 
?>

<div class="container">
	<div class="row">
		<div class="col-md-8" style="margin: 0 auto;">
			<div class="top-subscribe" style="background-color: #f1f1f1;">
				<div class="inner">
					<h2 class="h1 center"><?php echo $webinar_box_title; ?></h2>
					<div class="webinar-signup"><?php echo $webinar_signup_form; ?></div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="entry-content">

	<div class="container pagesection80">
	
		<div class="row">
		
			<div class="col-md-2"></div>
			
			<div class="col-md-8">
				<h2 class="center upper h1 padbot30"><?php echo $webinar_main_title; ?></h2>
			
				<?php if ( !empty( $webinar_month ) && !empty( $webinar_day ) ) { ?>
					<div class="webinar-left">
						<p class="month"><?php echo $webinar_month; ?></p>
						<p class="day"><?php echo $webinar_day; ?></p>
					</div>
					<div class="webinar-right">
						<?php the_content(); ?>
					</div>
				<?php }  else { ?>
					<?php the_content(); ?>
				<?php } ?>

				<?php echo $webinar_replay_video; ?>

			
			</div>
			
			<div class="col-md-2"></div>
			
		</div>
		
	</div>

</div><!-- .entry-content -->

<footer class="entry-footer" style="background: #FFF200;">
	<div class="container pagesection50">
		<div class="row">
			<div class="col-md-8 offset-md-2" style="padding: 0 40px;">
				<h2 class="h1 center"><?php echo $webinar_box_title; ?></h2>
				<div class="webinar-signup"><?php echo $webinar_signup_form; ?></div>
			</div>
		</div>
	</div>

</footer><!-- .entry-footer -->