<?php

global $post;

$boxes = get_field('bloki_tekstowe_z_obrazkiem', $post->ID);

foreach ($boxes as $key=>$box):
    
    $last = $key == sizeof($boxes)-1 ? 'is_last' : '';
?>

<div id="<?=create_slug($box['header'])?>" class="<?=$box['orientacja']?> <?=$last?>">
    <div class="content">
        <div class="in">
                <h2><?=$box['header']?></h2>
                <?=$box['text']?>

                <?php
                    $parent = $box['strona_szczegolowa'];
                    if($parent):
                    $path = parse_url($parent['url'], PHP_URL_PATH);
                    $slug = basename(untrailingslashit($path));

                    // Utwórz zapytanie WP_Query z parametrem name (slug)
                    $query = new WP_Query([
                        'name' => $slug,
                        'post_type' => ['page', 'post'], // Szukaj zarówno wśród stron jak i wpisów
                        'posts_per_page' => 1
                    ]);

                    // Sprawdź czy znaleziono wyniki
                    if ($query->have_posts()) {
                        $query->the_post();
                        $page_id = get_the_ID();
                    } 

                    $siblings = new WP_Query(array(
                        'post_type'      => 'page',
                        'post_parent'    => $page_id,
                        'posts_per_page' => -1,
                        'orderby'        => 'menu_order title',
                        'order'          => 'ASC'
                    ));

                    if ($siblings->have_posts()) { ?>
                        <ul>
                        <?php while ($siblings->have_posts()) : $siblings->the_post(); ?>
                            <li>
                            
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            
                            </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php
                    } else { 
                    ?>
                    <ul>
                        <li><a href="<?=$parent['url']?>" target="<?=$parent['target']?>"><?=$parent['title']?></a></li>
                    </ul>
                    <?php
                    }
                endif;                        
                ?>

        </div>
    </div>
    <div class="image">
        <?php 
            displayImage($box['obrazek']['url'], 'box-image', $box['header']);
        ?>
    </div>
</div>


<?php
endforeach;
?>
