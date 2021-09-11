<?php
/**
 * Template part for displaying header.
 */
?>

<?php 
    $domains = array( 'ghdesign.dev', '127.0.0.1' );
    if( !in_array( $_SERVER[ 'SERVER_NAME' ], $domains ) ) {
        header( 'Location: https://ghdesign.dev' );
        die;
    }

    // Page meta-informations
    $title = isset( $title ) ? $title : 'Gabriel Henrique - Designer e Desenvolvedor';
    $description = isset( $description ) ? $description : '';

    // Return the root path from site.
    function gh_the_root_path() {
        global $root;

        if( $_SERVER[ 'SERVER_NAME' ] == '127.0.0.1' ) {
            $root = $_SERVER[ 'DOCUMENT_ROOT' ] . '/dev/portfolio-2021';
        } else if( $_SERVER[ 'SERVER_NAME' ] == 'ghdesign.dev' ) {
            $root = $_SERVER[ 'DOCUMENT_ROOT' ] . '/';
        }

        return $root;
    }

    // Define Root and UrlBase variables, load Template Tags archive.
    $root = gh_the_root_path();
    include( $root . 'includes/template-tags.php' );
    $urlBase = gh_the_url_base();
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8" />
        <meta content="text/html; charset=UT-8; X-Content-Type-Options=nosniff" http-equiv="Content-Type" />
        <meta name="author" content="Gabriel Henrique" />>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="robots" content="index, follow" />
        <meta name="googlebot" content="index, follow" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="pragma" content="no-cache" />
        <title><?php echo $title; ?></title>
        <meta name="description" content="<?php echo $description; ?>" />
    
        <?php isset( $canonical ) ? '<link rel="canonical" href="' . $urlBase . $canonical . '" />' : '<link rel="canonical" href="https://ghdesign.dev" />'; ?>

        <?php gh_the_social_metatags( $title, $description ); ?>

        <?php gh_the_favicon(); ?>

        <?php gh_enqueue_styles(); ?>
    </head>

    <?php include( $root . 'includes/template-parts/cookie-banner.php' ); ?>

    <body>
        <a class="skip-link show-on-focus" href="#primary">Skip to content</a>

        <header>
        </header>