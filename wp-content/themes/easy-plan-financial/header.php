<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Easy Plan Financial
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script type="text/javascript">
WebFontConfig = {
google: { families: [ 'Ubuntu:400,500,700,400italic,500italic,700italic:latin' ] }
};
(function() {
var wf = document.createElement('script');
wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
wf.type = 'text/javascript';
wf.async = 'true';
var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(wf, s);
})(); </script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div id="page-wrapper" class="clearfix">

        <div id="mobile-nav" class="clearfix">
            <div class="scroll-box">
                <?php get_search_form( 'search-form' ); ?>
                <?php wp_nav_menu( array( 'menu' => 8 ) ); ?>
            </div>
        </div>

    	<header class="site-header">
            <div class="wrapper clearfix">
                <a class="site-logo" href="/"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="EasyPlan - Financial Services"></a>
                <div class="clearfix pull-right">
                    <div class="call-wrap clearfix">
                        <span class="spot-phone">1800 888 845</span>
                        <span class="spot-callus">call us!</span>
                    </div>
                    <?php wp_nav_menu( array( 'theme_location' => 'header-static' ) ); ?>
                    <?php get_search_form( 'search-form' ); ?>
                </div>
            </div> <!--! end of .wrapper -->
            <div class="nav-wrap">
                <div class="mob-bar clearfix">
                    <a id="mobile-trigger" class="mob-nav-trigger"><i class="fa fa-bars"></i> MENU</a>
                    <a class="mob-call pull-right" href="tel:1800888845">Call Now</a>
                </div>
                <nav>
                    <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                </nav>
            </div> <!--! end of .nav-wrap -->
    	</header> <!-- end of .site-header -->

        <div id="content-wrapper">
