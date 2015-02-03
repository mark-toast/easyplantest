<?php
/**
 * @package Easy Plan Financial
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-body'); ?>>

	<div class="entry-meta">
		<div>
			<?php easy_plan_financial_posted_on(); ?>
		</div>
		<div class="meta-footer">
			<?php easy_plan_financial_entry_footer(); ?>
		</div>
		<div class="meta-share">
			<?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?>
		</div>
	</div><!-- .entry-meta -->

	<div class="entry-content">

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'easy-plan-financial' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">

	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
