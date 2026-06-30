<?php
global $post;
// Sprawdź, czy bieżąca strona ma rodzica
$current_page_id = $post->ID;
$parent_id = wp_get_post_parent_id();

// Jeśli nie ma rodzica, aktualny post jest na najwyższym poziomie
if (!$parent_id) {
    $parent_id = $current_page_id; // Ustaw bieżącą stronę jako rodzica
}

// Pobierz wszystkie strony z tym samym rodzicem
$siblings = new WP_Query(array(
    'post_type'      => 'page',
    'post_parent'    => $parent_id,
    'posts_per_page' => -1,
    'orderby'        => 'menu_order title',
    'order'          => 'ASC',
    'post__not_in'   => array($current_page_id) // Wyklucz bieżącą stronę
));

// Sprawdź, czy znaleziono siostrzane strony

wp_reset_postdata(); // Zresetuj dane postu

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="content">
                <div class="in">
                    <div class="row">
                        <?php 

                        if ($siblings->have_posts()) : ?>
                                    <?php while ($siblings->have_posts()) : $siblings->the_post(); ?>
                                    <div class="col">
                                    
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    
                                    </div>
                                    <?php endwhile; ?>
                            
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if(!$args['hide_break']):?>
    <div class="break full"><div></div></div>
<?php endif;?>