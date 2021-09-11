<?php 
/**
 * Custom template tags for GhDesign.dev.
 */

// Return the url Base from site.
if( ! function_exists( 'gh_the_url_base' ) ) {
    function gh_the_url_base() {
        global $urlBase;

        $http = isset( $_SERVER[ 'HTTPS' ] ) ? 'https://' : 'http://';

        if( $_SERVER[ 'SERVER_NAME' ] == '127.0.0.1' ) {
            $urlBase = 'http://127.0.0.1/dev/portfolio-2021/';
        } else if( $_SERVER[ 'SERVER_NAME' ] == 'ghdesign.dev' ) {
            $urlBase = 'https://ghdesign.dev';
        }

        return $urlBase;
    }
}

// Social Metatags
if( ! function_exists( 'gh_the_social_metatags' ) ) {
    function gh_the_social_metatags( $title, $description ) {
        echo '';
    }
}

// Return all scripts that will be loaded on footer.
if( ! function_exists( 'gh_enqueue_scripts' ) ) {
    function gh_enqueue_scripts() {
        echo '';
    }
}

// Return all styles that will be loaded on header.
if( ! function_exists( 'gh_enqueue_styles' ) ) {
    function gh_enqueue_styles() {
        echo '';
    }
}

// Site Favicon
if( ! function_exists( 'gh_the_favicon' ) ) {
    function gh_the_favicon() {
        echo '';
    }
}

// Display inline image elements.
if( ! function_exists( 'gh_the_image' ) ) {
    function gh_the_image( $file_name, $label = '', $format = 'png', $classes = '' ) {
        if( empty( $label ) ) {
            $label = 'Ícone';
        }

        $path = $GLOBALS['urlBase'] . 'assets/images' . $file_name . '.' . $format;

        echo '<img src="' . $path . '" class="image image=' . $file_name . ' ' . $classes . '" alt="' . $label . '" />';
    }
}
