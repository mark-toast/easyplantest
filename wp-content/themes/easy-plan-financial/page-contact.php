<?php
/**
 * Template Name: Contact
 *
 * @package Easy Plan Financial
 */
?>

<?php get_header(); ?>

    <style type="text/css">

    .acf-map {
        height: 400px;
        border: #ccc solid 1px;
        margin: 20px 45px;
    }

    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script type="text/javascript">
    (function($) {

    /*
    *  render_map
    *
    *  This function will render a Google Map onto the selected jQuery element
    *
    *  @type    function
    *  @date    8/11/2013
    *  @since   4.3.0
    *
    *  @param   $el (jQuery element)
    *  @return  n/a
    */

    function render_map( $el ) {

        // var
        var $markers = $el.find('.marker');

        // vars
        var args = {
            zoom        : 16,
            center      : new google.maps.LatLng(0, 0),
            mapTypeId   : google.maps.MapTypeId.ROADMAP
        };

        // create map
        var map = new google.maps.Map( $el[0], args);

        // add a markers reference
        map.markers = [];

        // add markers
        $markers.each(function(){

            add_marker( $(this), map );

        });

        // center map
        center_map( map );

    }

    /*
    *  add_marker
    *
    *  This function will add a marker to the selected Google Map
    *
    *  @type    function
    *  @date    8/11/2013
    *  @since   4.3.0
    *
    *  @param   $marker (jQuery element)
    *  @param   map (Google Map object)
    *  @return  n/a
    */

    function add_marker( $marker, map ) {

        // var
        var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

        // create marker
        var marker = new google.maps.Marker({
            position    : latlng,
            map         : map
        });

        // add to array
        map.markers.push( marker );

        // if marker contains HTML, add it to an infoWindow
        if( $marker.html() )
        {
            // create info window
            var infowindow = new google.maps.InfoWindow({
                content     : $marker.html()
            });

            // show info window when marker is clicked
            google.maps.event.addListener(marker, 'click', function() {

                infowindow.open( map, marker );

            });
        }

    }

    /*
    *  center_map
    *
    *  This function will center the map, showing all markers attached to this map
    *
    *  @type    function
    *  @date    8/11/2013
    *  @since   4.3.0
    *
    *  @param   map (Google Map object)
    *  @return  n/a
    */

    function center_map( map ) {

        // vars
        var bounds = new google.maps.LatLngBounds();

        // loop through all markers and create bounds
        $.each( map.markers, function( i, marker ){

            var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

            bounds.extend( latlng );

        });

        // only 1 marker?
        if( map.markers.length == 1 )
        {
            // set center of map
            map.setCenter( bounds.getCenter() );
            map.setZoom( 16 );
        }
        else
        {
            // fit to bounds
            map.fitBounds( bounds );
        }

    }

    /*
    *  document ready
    *
    *  This function will render each map when the document is ready (page has loaded)
    *
    *  @type    function
    *  @date    8/11/2013
    *  @since   5.0.0
    *
    *  @param   n/a
    *  @return  n/a
    */

    $(document).ready(function(){

        $('.acf-map').each(function(){

            render_map( $(this) );

        });

    });

    })(jQuery);
    </script>

    <?php $image = wp_get_attachment_image_src(get_field('banner_image', $post->post_parent), 'full'); ?>
    <section id="page-banner" style="background-image:url('<?php echo $image[0]; ?>');">

        <div class="banner-text">
            <?php the_field('banner_text'); ?>
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

            <?php
                $location = get_field('office_location');
                if( !empty($location) ):
            ?>
            <div class="acf-map">
                <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
            </div>
            <?php endif; ?>

        </div> <!--! end of .content-wrap -->

        <aside id="sidebar">

            <h1>Contact Us</h1>

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
