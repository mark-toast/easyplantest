<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Easy Plan Financial
 */
?>

    <footer class="site-footer" class="clearfix" style="float: left; width: 100%;">
        <div id="lenders" class="clearfix">
            <?php if( is_home() ) : ?>
            <h2>Our Group of Lenders</h2>
            <?php endif; ?>
            <?php if( have_rows('lender_logos', 'option') ): ?>
            <ul>
                <?php while( have_rows('lender_logos', 'option') ): the_row(); ?>
                <li><img src="<?php the_sub_field('lender_logo'); ?>"></li>
                <?php endwhile; ?>
            </ul>
            <?php endif; ?>
            <?php if( is_home() ) : ?>
            <p class="lender-disclaimer">Not all brokers sell the products of all lenders, and some products of lenders may require special approval.</p>
            <span class="action-button blue-button">
                <a href="#">View All Lenders</a>
            </span>
            <?php endif; ?>

            <?php if( is_home() ) : ?>
            <div id="more-lenders-block">
            <?php else : ?>
            <div id="more-lenders-block" class="internal">
            <?php endif; ?>
                <span id="lenders-arrow"><img src="<?php bloginfo('template_directory'); ?>/img/lenders-arrow.png"></span>
                <span id="more-text">VIEW MORE LENDERS HERE!</span>
                <span id="lenders-lip"><img src="<?php bloginfo('template_directory'); ?>/img/lenders-lip.png"></span>
            </div>

        </div> <!--! end of #lenders -->

        <?php if ( !is_front_page() ) : ?>

        <div class="cta-buttons clearfix">
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
        </div> <!--! end of .cta-buttons -->

        <?php endif; ?>

        <div id="clause" class="ckearfix">
            <div class="wrapper">
                <div class="clearfix">
                    <img src="<?php bloginfo('template_directory'); ?>/img/logo-clause.png" alt="EasyPlan Financial Services">
                    <p>The information provided in this website is for general education purposes only and does not constitute specialist advice. It should not be relied upon for the purposes of entering into any legal or financial commitments. Specific investment advice should be obtained from a suitably qualified professional  before adopting any investment strategy. For more information, please contact us today!</p>
                </div>
                <img src="<?php bloginfo('template_directory'); ?>/img/logo-afg2.png" alt="AFG ACCREDITED MEMBER">
                <img src="<?php bloginfo('template_directory'); ?>/img/logo-broker.png" alt="MFAA APPROVED BROKER">
                <img src="<?php bloginfo('template_directory'); ?>/img/logo-afg.png" alt="AFG WINNER 2014 - AFG FINALIST 2014">
            </div>
        </div> <!--! end of #clause -->

        <div id="quick-links" class="clearfix">
            <div class="wrapper clearfix">
                <span>Quicklinks</span>
                <?php wp_nav_menu( array( 'theme_location' => 'quick-links' ) ); ?>
            </div>
        </div> <!--! end of #quick-links -->

        <div class="wrapper clearfix">
        <?php wp_nav_menu( array('$menu_id' => 9) ); ?>
        </div>

        <p class="copyright">&copy; 2014 ParkTrent Properties Group Pty. Ltd.<br>All rights reserved | Developed by <a href="http://toastcreative.com.au">Toast Creative</a></p>
    </footer> <!--! end of .site-footer -->

<?php wp_footer(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-4805518-81', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>
