<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo esc_attr_e( 'Search for:', 'portfolio-one' ) ?></span>
        <input type="search" class="search-field"
            placeholder="<?php echo esc_attr_e( 'Buscar &#46;&#46;&#46;', 'portfolio-one' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_e( 'Search for:', 'portfolio-one' ) ?>" />
    </label>
</form>