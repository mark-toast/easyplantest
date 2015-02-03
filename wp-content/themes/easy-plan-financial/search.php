<?php
/**
 * The template for displaying search results pages.
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

    <section class="wrapper type-page clearfix">

    	<div class="content-wrap clearfix">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">

                <div class="breadcrumbs">
                    <?php if(function_exists('bcn_display'))
                    {
                        bcn_display();
                    }?>
                </div>

                <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'easy-plan-financial' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

            </header><!-- .entry-header -->

            <div class="article-list">

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'content', 'search' );
					?>

				<?php endwhile; ?>

            <?php if ( function_exists( 'page_navi' ) ) { page_navi('show_boundary=false&next_label=Next Page&prev_label=Last Page'); } ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>



			</div> <!-- end of .article-list -->

		</div> <!--! end of .content-wrap -->



        </div>
	</section>

<?php get_footer(); ?>
