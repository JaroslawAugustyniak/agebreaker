<div class="<?=$args['orientacja'] == 'right' ? 'left' : 'right'?>">
    <div class="content">
        <div class="in">
            <?=$args['tresc']?>
        </div>
    </div>
    <div class="image">
        <?php 
            $args['obrazek'] ? displayImage($args['obrazek']['url'], 'box-image') : '';
        ?>
    </div>
</div>
<?php if(!$args['hide_break']):?>
    <div class="break full"><div></div></div>
<?php endif;?>