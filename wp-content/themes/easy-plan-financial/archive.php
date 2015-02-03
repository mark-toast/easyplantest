<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Easy Plan Financial
 */

get_header(); ?>

	<?php $image = wp_get_attachment_image_src(get_field('banner_image', get_post(106)), 'full'); ?>
    <section id="page-banner" style="background-image:url('<?php echo $image[0]; ?>');">

        <div class="banner-text">
            <?php the_field('banner_text', get_post(106)) ?>
        </div>

    </section>

    <section id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

    	<div class="content-wrap clearfix">

    	<?php if ( have_posts() ) : ?>

    		<header class="page-header">
				<div class="breadcrumbs">
                    <?php if(function_exists('bcn_display'))
                    {
                        bcn_display();
                    }?>
                </div>

				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<div class="article-list">

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php if ( function_exists( 'page_navi' ) ) { page_navi('show_boundary=false&next_label=Next Page&prev_label=Last Page'); } ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</div> <!-- end of .article-list -->

		</div> <!--! end of .content-wrap -->

<aside id="sidebar">

            <h1>News Categories</h1>

            <?php get_sidebar(); ?>

        </aside> <!--! end of #sidebar -->

	</section>
<?php get_footer(); ?>
