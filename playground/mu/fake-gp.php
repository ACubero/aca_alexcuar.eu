<?php
add_filter( 'post_class', function ( $c ) { return array_merge( $c, array( 'infinite-scroll-item', 'generate-columns', 'tablet-grid-50', 'mobile-grid-100', 'grid-parent', 'grid-50' ) ); } );
add_action( 'wp_enqueue_scripts', function () { wp_enqueue_style( 'generate-blog', content_url( '/plugins/gp-premium/blog.css' ) ); } );
add_filter( 'excerpt_length', function () { return 200; }, 100 );
