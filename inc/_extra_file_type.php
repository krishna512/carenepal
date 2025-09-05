<?php

add_filter( 'wp_check_filetype_and_ext', 'uswift_filter_ico_upload', 10, 4 );
function uswift_filter_ico_upload( $types, $file, $filename, $mimes ){
    if ( false !== strpos( $filename, '.ico' ) ) {
        $types['ext'] = 'ico';
        $types['type'] = 'image/ico';
    }

   if ( false !== strpos( $filename, '.webp' ) ) {
        $types['ext'] = 'webp';
        $types['type'] = 'image/webp';
    }


    // if( substr( $filename, -4 ) == '.svg' ){
    //     $types['ext'] = 'svg';
    //     $types['type'] = 'image/svg+xml';
    // }

    return $types;
}