<?php
/**
 * @package   Gantry 5 Theme
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2015 RocketTheme, LLC
 * @license   GNU/GPLv2 and later
 *
 * http://www.gnu.org/licenses/gpl-2.0.html
 */

defined( 'ABSPATH' ) or die;

/*
 * The template for displaying comments
 */

$gantry = Gantry\Framework\Gantry::instance();
$theme = $gantry[ 'theme' ];

// We need to render contents of <head> before plugin content gets added.
$context = Timber::get_context();
$context[ 'page_head' ] = $theme->render( 'partials/page_head.html.twig', $context );

$post = new TimberPost();
$context[ 'post' ] = $post;

if( post_password_required( $post ) ) {
    return;
}

Timber::render( [ 'partials/comments-' . $post->ID . '.html.twig', 'partials/comments-' . $post->post_type . '.html.twig', 'partials/comments.html.twig' ], $context );
