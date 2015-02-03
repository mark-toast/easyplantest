<?php
/**
 * Template Name: News
 *
 * @package Easy Plan Financial
 */
?>

<?php get_header(); ?>


    <?php $image = wp_get_attachment_image_src(get_field('banner_image', $post->post_parent), 'full'); ?>
    <section id="page-banner" style="background-image:url('<?php echo $image[0]; ?>');">

        <div class="banner-text">
            <?php the_field('banner_text', $post->post_parent) ?>
        </div>

    </section>

    <section id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

        <div class="content-wrap clearfix">

            <header class="page-header">

                <div class="breadcrumbs">
                    <?php if(function_exists('bcn_display'))
                    {
                        bcn_display();
                    }?>
                </div>

                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

            </header><!-- .entry-header -->

            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'content', 'page' ); ?>
            <?php endwhile; ?>

           <div class="article-list">
                <?php // Display blog posts on any page @ http://m0n.co/l
                $temp = $wp_query; $wp_query= null;
                $wp_query = new WP_Query(); $wp_query->query('showposts=5' . '&paged='.$paged);
                while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                <article class="post clearfix">
                    <div class="post-thumb">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <?php the_post_thumbnail('thumbnail'); ?>
                            </a>
                        <?php endif; ?>
                    </div>

                    <div class="post-details">
                        <header>
                            <h2><a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></h2>
                            <div class="entry-meta">
                                <?php easy_plan_financial_posted_on(); ?>
                            </div><!-- .entry-meta -->
                        </header>

                        <div class="post-excerpt">
                            <?php the_excerpt(); ?>
                        </div>

                        <footer class="entry-footer">
                            <?php easy_plan_financial_entry_footer(); ?>
                        </footer><!-- .entry-footer -->
                    </div>
                </article>

                <?php endwhile; ?>

                <?php if ( function_exists( 'page_navi' ) ) { page_navi('show_boundary=false&next_label=Next Page&prev_label=Last Page'); } ?>

            </div> <!--! end of .article-list -->

        </div> <!--! end of .content-wrap -->

        <aside id="sidebar">

            <h1>News Categories</h1>

            <?php get_sidebar(); ?>

        </aside> <!--! end of #sidebar -->

    </section>

<?php get_footer(); ?>
