<?php


// set a custom field prefix
define( "CMB_PREFIX", "_p_" );



// redirect incorrect URLs to the correct ones.
$server = $_SERVER['HTTP_HOST'];
if ( $server == 'lscu.giraphprojects.com' ) {
    wp_redirect( 'http://www.lscu.coop' . $_SERVER['REQUEST_URI'] );
    exit;
}



// define our color choices for all metaboxes.
$colors = array(
    'sky' => 'Sky',
    'teal' => 'Teal',
    'navy' => 'Navy',
    'forest' => 'Forest',
    'lime' => 'Lime',
    'orange' => 'Orange',
    'yellow' => 'Yellow',
    'grey-light' => 'Grey - Light',
    'grey-dark' => 'Grey - Dark',
);



// include some theme-related things
include( "library/menus.php" );
include( "library/scripts.php" );
include( "library/widgets.php" );


// an extra image manipulation function
include( "library/images.php" );


// include our metaboxes library
include( "library/metabox.php" );
include( "library/metabox-theme.php" );


// include quote metaboxes/functions
include( "library/title.php" );
include( "library/showcase.php" );
include( "library/accordion.php" );


// post types
include( "library/post-type/job.php" );
include( "library/post-type/event.php" );


// widgets
include( "library/twitter-aggregator/widget.php" );


// interstitial
include( "library/interstitial.php" );


// api adjustments to jwt-auth endpoint
include( "library/api.php" );


// include custom login stylesheet
include( "library/login.php" );


// [anchor] shortcode
function p_anchor( $atts, $content = null, $code = "" ) {
    return '<a name="'.$content.'"></a>';
}
add_shortcode('anchor' , 'p_anchor' );


// dequeue bbpress styles
add_action( 'wp_print_styles', 'deregister_bbpress_styles', 15 );
function deregister_bbpress_styles() {
    wp_deregister_style( 'bbp-default' );
}


// enable oembed and shortcodes in text widgets
add_filter( 'widget_text', array( $wp_embed, 'run_shortcode' ), 8 );
add_filter( 'widget_text', array( $wp_embed, 'autoembed'), 8 );


// pagination
function pagination($prev = '&laquo;', $next = '&raquo;') {
    global $wp_query, $wp_rewrite;

    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

    $pagination = array(
        'base' => @add_query_arg('paged','%#%'),
        'format' => '',
        'total' => $wp_query->max_num_pages,
        'current' => $current,
        'prev_text' => __($prev),
        'next_text' => __($next),
        'type' => 'plain'
	);

    if ( $wp_rewrite->using_permalinks() ) $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

    if ( !empty($wp_query->query_vars['s']) ) $pagination['add_args'] = array( 's' => get_query_var( 's' ) );

    echo paginate_links( $pagination );
}


