<?php

/**
 * Template Name: Homepage
 * 
 * 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package K5
 */
global $post;


$page = $post;

get_header(); 

?>
<div id="sections" data-spy="scroll" data-target="#site-navigation" data-offset="200">
    <section id="header"><?php get_template_part( 'templates/parts/part', 'header');?></section>
    <section id="baza-aktywnosci"><?php get_template_part( 'templates/parts/part', 'znajdz-aktywnosc');?></section>
    <section id="text-boxes"><?php get_template_part( 'templates/parts/part', 'text-boxes');?></section>
</div>

<?php
get_footer();
