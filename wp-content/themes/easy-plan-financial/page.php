<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Easy Plan Financial
 */
?>

<?php get_header(); ?>


    <?php $image = wp_get_attachment_image_src(get_field('banner_image', $post->post_parent), 'full'); ?>
    <section id="page-banner" style="background-image:url('<?php echo $image[0]; ?>');">

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

		        <div class="banner-text">
		            <?php the_field('banner_text', $post->post_parent) ?>
		        </div>

<!--                 <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?> -->

            </header><!-- .entry-header -->

            <?php while ( have_posts() ) : the_post(); ?>
            	<?php get_template_part( 'content', 'page' ); ?>
            <?php endwhile; ?>

        </div> <!--! end of .content-wrap -->

        <aside id="sidebar">


            <h1><?php echo empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent ); ?></h1>

            <ul>
                <?php
                    $ancestors = get_post_ancestors($post->ID);
                    $parent = $ancestors[0];

                    if($parent) { //if its a CHILD page
                        echo wp_list_pages("title_li=&include=".$parent."&echo=0");
                        $children = wp_list_pages("title_li=&child_of=".$parent."&echo=0");
                    }  else { //if it's a PARENT page
                        echo wp_list_pages("title_li=&include=".get_the_ID()."&echo=0");
                        $children = wp_list_pages("title_li=&child_of=".get_the_ID()."&echo=0");
                    }
                    if ($children) { ?>
                <?php echo $children; ?>
            </ul>
                <?php } ?>

        </aside> <!--! end of #sidebar -->

    </section>

<?php get_footer(); ?>
