<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Easy Plan Financial
 */
?>

<article class="post clearfix">
	<?php if ( has_post_thumbnail() ) : ?>
    <div class="post-thumb">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail('thumbnail'); ?>
        </a>
    </div>
    <?php endif; ?>

    <?php if ( !has_post_thumbnail() ) : ?>
    <div class="post-details" style="width:100%;float:none;">
    	<header>
            <h2><a href="<?php the_permalink(); ?>" title="Read more">Page: <?php the_title(); ?></a></h2>
        </header>
    <?php else : ?>
    <div class="post-details">
    	<header>
            <h2><a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></h2>
            <div class="entry-meta">
                <?php easy_plan_financial_posted_on(); ?>
            </div><!-- .entry-meta -->
        </header>
    <?php endif; ?>


        <div class="post-excerpt">
            <?php the_excerpt(); ?>
        </div>

        <footer class="entry-footer">
            <?php easy_plan_financial_entry_footer(); ?>
        </footer><!-- .entry-footer -->
    </div>
</article>
