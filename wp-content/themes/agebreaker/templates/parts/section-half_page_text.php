
<div class="columns">
    <div class="column bg-<?=$args['kolor_tla']?>">
        <div class="content containerHalfLeft">
            <div class="in">
                <?=$args['tresc']?>
            </div>
        </div>
    </div>
    <div class="column bg-<?=$args['kolor_tla_-_druga_kolumna']?>">
        <div class="content containerHalfRight">
            <div class="in">
                <?=$args['tresc_druga_kolumna']?>
            </div>
        </div>
    </div>
</div>
<?php if(!$args['hide_break']):?>
    <div class="break full"><div></div></div>
<?php endif;?>