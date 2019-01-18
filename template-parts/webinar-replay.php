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
	$fullwidth_optin = get_post_meta( get_the_ID(), 'bbwebinar_optin_select', true );
?>


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="top-subscribe">
				<div class="inner">
					<?php echo $webinar_replay_video; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="entry-content">
	<div class="container pagesection80">
		<div class="row">			
			<div class="col-md-6 offset-md-3">
				<h2 class="center upper h1 padbot30">
					<?php echo $webinar_main_title; ?>
				</h2>
				<?php the_content(); ?>
			</div>		
		</div>
	</div>

</div><!-- .entry-content -->


<?php if ( !empty( $fullwidth_optin ) ) { ?>
	<footer class="entry-footer optinwrapper">
		<div class="container">
			<img class="center" src="/wp-content/themes/beingboss2018/img/Optin_Icon_White.png">
			<h2 class="center white padbot0">FREE RESOURCE: <?php echo get_the_title($fullwidth_optin); ?></h2>
			<?php echo apply_filters('the_content', get_post_field('post_content', $fullwidth_optin)); ?>
		</div>
	</footer>
<?php } ?>
