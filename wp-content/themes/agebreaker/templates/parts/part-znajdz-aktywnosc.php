<?php

global $post;
?>

<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><?=get_field('filter_aktywnosci_-_naglowek', $post->ID)?></h2>
            </div>
        </div>
    </div>
</div>
<div class="formularz">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php

                    echo do_shortcode('[searchandfilter field="13"]');
                    echo do_shortcode('[searchandfilter field="15"]');
                    echo do_shortcode('[searchandfilter field="16"]');
                    echo do_shortcode('[searchandfilter field="17"]');
                    echo do_shortcode('[searchandfilter field="12"]');

                ?>

<div class="search-filter-base search-filter-field search-filter-field--id-14 search-filter-field--type-control search-filter-field--control-type-submit search-filter-style--id-1 search-filter-style--control-submit"><button class="search-filter-input-button search-filter-field__input" id="searchInput" alt="Szukaj">Szukaj</button></div>
            </div>
        </div>
    </div>
</div>
<div class="break full"><div></div></div>
<div id="results_main" class="d-none"><?php echo do_shortcode('[searchandfilter query="2" action="show-results"]');?></div>
    
