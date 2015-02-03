<?php
/**
 * The template for displaying all single posts.
 *
 * @package Easy Plan Financial
 */

get_header(); ?>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <?php $image = wp_get_attachment_image_src(get_field('banner_image', get_post(106)), 'full'); ?>
    <section id="page-banner" style="background-image:url('<?php echo $image[0]; ?>');">

        <div class="banner-text">
            <?php the_field('banner_text', get_post(106)) ?>
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

				<?php get_template_part( 'content', 'single' ); ?>

			<?php endwhile; // end of the loop. ?>

            <div id="comment-block">
                <?php $current_page = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
                <div class="fb-comments" data-href="<?php echo $current_page ?>" data-numposts="5" data-colorscheme="light"></div>
            </div>

		 </div> <!--! end of .content-wrap -->

        <aside id="sidebar">

            <h1>News Categories</h1>

            <?php get_sidebar(); ?>

        </aside> <!--! end of #sidebar -->

    </section>
<?php get_footer(); ?>
