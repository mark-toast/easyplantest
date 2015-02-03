<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Easy Plan Financial
 */
?>

<section class="no-results not-found">
	<header class="page-header">

        <div class="breadcrumbs">
            <?php if(function_exists('bcn_display'))
            {
                bcn_display();
            }?>
        </div>

        <h1><?php _e( 'Nothing Found', 'easy-plan-financial' ); ?></h1>

   </header><!-- .entry-header -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'easy-plan-financial' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'easy-plan-financial' ); ?></p>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'easy-plan-financial' ); ?></p>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
