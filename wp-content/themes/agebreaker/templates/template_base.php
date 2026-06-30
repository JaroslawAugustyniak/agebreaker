<?php

/**
 * Template Name: Baza aktywności
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
<div id="base_holder">
    <div class="filter-toggle">Filtruj</div>
    <div class="filter_bg">
        <div class="filter">
            <?= do_shortcode('[searchandfilter field="Nazwa aktywności"]')?>
            <?= do_shortcode('[searchandfilter field="Metoda aktywizująca"]')?>
            <?= do_shortcode('[searchandfilter field="Cele"]')?>
            

            <?= do_shortcode('[searchandfilter field="Czas trwania"]')?>
            <?= do_shortcode('[searchandfilter field="Forma"]')?>
            
            <?= do_shortcode('[searchandfilter field="Liczba uczestników"]')?>
        </div>
    </div>
    <div class="posts_holder">
        <?php the_title('<h1 class="post-title">', '</h1>'); 
        the_content();
        ?>
        <div id="posts">
            <?= do_shortcode('[searchandfilter query="1" action="show-results"]')?>
        </div>
    </div>
</div>

<?php
get_footer();
