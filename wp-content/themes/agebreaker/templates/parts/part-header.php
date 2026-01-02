<?php
global $post;


?>

<div id="headerImageHolder" class="<?=(has_post_thumbnail($post->ID) ? 'has-image' : '')?>">
<?php 
if (has_post_thumbnail($post->ID)) {
    echo get_the_post_thumbnail($post->ID, 'full');
}

$apla = get_field('add_apla', $post->ID);

$parentTitle = '';
if ($post->post_parent) {
    $parent = get_post($post->post_parent);
    
    $parentTitle = $parent->post_title;
}

?>

<div class="content <?=$apla ? 'has-apla' : ''?>">
    
<div class="container">
    <div class="<?=$apla ? 'apla' : ''?>"></div>
    <div class="row">
        <div class="col-md-12">
            <h1><?php if(is_front_page()): the_title(); else: echo $parentTitle; endif;?></h1>
            <?php if(is_front_page()): the_content(); else: the_title('<h2>', '</h2>'); endif;?>                
        </div>
    </div>
</div>
</div>

</div>

