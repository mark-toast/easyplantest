<?php
/**
 * Template Name: Home
 *
 * @package Easy Plan Financial
 */
?>

<?php get_header(); ?>

<div id="home" class="clearfix">

    <section id="page-banner">

        <?php if( have_rows('carousel') ): ?>

        <ul id="carousel">
            <?php while( have_rows('carousel') ): the_row(); ?>
            <li>
                <img src="<?php the_sub_field('slide_image'); ?>">
                <div class="slide-cta">
                    <?php echo the_sub_field('slide_cta'); ?>
                </div>
            </li>
            <?php endwhile; ?>
        </ul>

        <ul id="carousel-buttons">
            <?php while( have_rows('carousel') ): the_row(); ?>
            <li>
                <div class="triangle"></div>
                <?php the_sub_field('slide_button_text'); ?>
            </li>
            <?php endwhile; ?>
        </ul>
        <?php endif; ?>

        <div class="banner-text">
            <?php the_field('banner_text', $post->post_parent) ?>
        </div>



    </section>

    <section id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

        <div class="content-wrap clearfix">

            <div class="cta-buttons mobile">
                <div class="wrapper clearfix">
                    <div class="loans">
                        <a href="/personal-loans">
                            <img src="<?php bloginfo('template_directory'); ?>/img/cta-loans.png" alt="LOANS">
                            <p>Let us help find<br> the loan thats<br> right for you!</p>
                        </a>
                    </div>
                    <div class="investors">
                        <a href="/investors">
                            <img src="<?php bloginfo('template_directory'); ?>/img/cta-investors.png" alt="INVESTORS">
                            <p>We can help you reach your investment goals!</p>
                        </a>
                    </div>
                    <div class="refinancing">
                        <a href="/refinancing">
                            <img src="<?php bloginfo('template_directory'); ?>/img/cta-refinancing.png" alt="REFINANCING">
                            <p>Let us find you a better deal on your home loan!</p>
                        </a>
                    </div>
                    <div class="meet-with-us">
                        <a href="/home-loans/meet-with-a-broker">
                            <img src="<?php bloginfo('template_directory'); ?>/img/cta-meetwithus.png" alt="MEET WITH US">
                            <p>Book a meeting with an experienced broker today!</p>
                        </a>
                    </div>
                </div>
            </div> <!--! end of #cta-buttons -->

            <div class="cta-buttons desktop">
                <div class="wrapper clearfix">
                    <div class="loans">
                        <span class="image-wrap">
                            <img src="<?php bloginfo('template_directory'); ?>/img/cta-home-loans.jpg" alt="LOANS">
                        </span>
                        <h2>Loans</h2>
                        <p>Let us help find<br> the loan thats<br> right for you!</p>
                        <a href="/personal-loans">Find Out More</a>
                    </div>
                    <div class="investors">
                        <span class="image-wrap">
                            <img src="<?php bloginfo('template_directory'); ?>/img/cta-home-investors.jpg" alt="INVESTORS">
                        </span>
                        <h2>Investors</h2>
                        <p>We can help you reach your investment goals!</p>
                        <a href="/investors">Find Out More</a>
                    </div>
                    <div class="refinancing">
                        <span class="image-wrap">
                            <img src="<?php bloginfo('template_directory'); ?>/img/cta-home-refinancing.jpg" alt="REFINANCING">
                        </span>
                        <h2>Refinancing</h2>
                        <p>Let us find you a better deal on your home loan!</p>
                        <a href="/refinancing">Find Out More</a>
                    </div>
                </div>
            </div> <!--! end of #cta-buttons -->

            <div class="home-content">

                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content', 'page' ); ?>
                <?php endwhile; ?>
            </div>

        </div> <!--! end of .content-wrap -->

        <aside id="sidebar">

            <h2>Meet with a loan expert</h2>

            <?php echo do_shortcode('[contact-form-7 id="133" title="Home Form"]'); ?>

        </aside> <!--! end of #sidebar -->

    </section>

    <div class="article-list">
        <div class="wrapper">
            <?php // Display blog posts on any page @ http://m0n.co/l
            $temp = $wp_query; $wp_query= null;
            $wp_query = new WP_Query(); $wp_query->query('showposts=3' . '&paged='.$paged);
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
                    </header>

                    <div class="post-excerpt">
                        <?php my_excerpt(35); ?>
                    </div>
                </div>
            </article>
            <?php endwhile; ?>
        </div> <!--! end of .wrapper -->
        <span class="view-all action-button blue-button">
            <a href="/news">View All News Articles</a>
        </span>
        <a id="article-next">NEXT</a>
        <a id="article-prev">PREV</a>
    </div> <!--! end of .article-list -->
</div>

<script>
    jQuery(document).ready(function(){
        jQuery('#carousel').carouFredSel({
            swipe: true,
            auto: false,
            responsive: true,
            items: {
                visible: 1,
                height: 'variable',
                width: 1200
            }
        });

        if(jQuery(window).width() < 768) {
            jQuery('.article-list .wrapper').carouFredSel({
                swipe: true,
                auto: false,
                responsive: true,
                width: '100%',
                next: jQuery('#article-next'),
                prev: jQuery('#article-prev')
            });

            jQuery('.article-list .readmore').text('Read Full Article');
        }

        jQuery('#sidebar').height(jQuery('.content-wrap').height()+32);

        jQuery('#carousel-buttons li:first-child').addClass('active');

        jQuery('#carousel-buttons li').click(function() {
            var triggerBtn = jQuery(this);

            jQuery('#carousel-buttons li').removeClass('active');
            triggerBtn.addClass('active');

            jQuery('#carousel').trigger('slideTo', triggerBtn.index());
            return false;
        });

        jQuery('.content-wrap .cta-buttons .wrapper p').each(function() {
            jQuery(this).find('br').remove();
        })
    });
</script>

<?php get_footer(); ?>
