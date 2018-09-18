<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
$postid = get_the_ID();
$toppadding = get_post_meta( $postid, 'bbpage_top_padding', true );
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php $page_content = get_post_meta( $postid, 'bbpage_content', true ); ?>
							<div class="entry-content" style="padding-top:<?php echo $toppadding; ?>px">
								<?php if ( $page_content ) {
										echo $page_content;
									} else {
										the_content(); 
									} ?>

							</div><!-- .entry-content -->

	<footer class="entry-footer">

	

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
