<?php

/*
Plugin Name: Wp Sanitize File Name
Plugin URI: http://dev.liudas.eu/wp-sanitize-file-name
Description: Replaces chars which are not in 0-255 range.
Version: 1.0
Author: lso
Author URI: http://dev.liudas.eu/
License: ISC
*/

function sanitize_name( $filename ) {
	$info = pathinfo( $filename );
	$ext  = empty( $info['extension'] ) ? '' : '.' . $info['extension'];
	$name = basename( $filename, $ext );
	$name = preg_replace( '/[^a-z0-9_ ]/i', '-', $name );

	return $name . $ext;
}

add_filter( 'sanitize_file_name', 'sanitize_name', 10 );