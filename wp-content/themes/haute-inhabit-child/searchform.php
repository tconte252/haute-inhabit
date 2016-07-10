<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="text" class="search-field" value="<?php echo get_search_query(); ?>" name="s" id="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    <input type="submit"  class="search-submit" value="<?php echo esc_attr__('Search') ?>" />
</form>