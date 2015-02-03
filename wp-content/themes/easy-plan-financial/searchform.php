<form class="search-form" action="<?php bloginfo('url');?>" method="get">
    <div>
        <input type="text" name="s" class="search" placeholder="Search Website" value="<?php the_search_query(); ?>" autocomplete="off">
        <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>">
    </div>
</form>
