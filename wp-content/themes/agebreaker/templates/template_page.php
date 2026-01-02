<?php

/**
 * Template Name: Strona
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
    <div class="break full"><div></div></div>
    <?php
        $sections = get_field('sekcje', $post->ID);
        if($sections)
        foreach($sections as $key=>$section): 
        // echo $section['typ_sekcji'];

        $bg = $section['typ_sekcji'] == 'half_page_text' ? '' : 'bg-'.$section['kolor_tla'];
    ?>

    <section id="<?=$section['typ_sekcji']?>-<?=$key?>" class="<?=$section['typ_sekcji']?> <?=$bg?>">
        <?php get_template_part( 'templates/parts/section', $section['typ_sekcji'], $section);?>        
    </section>

    <?php endforeach; ?>

</div>

<?php
get_footer();
