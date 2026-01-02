<?php 
    global $post;
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php the_title('<h1>', '</h1>'); ?>

            <div class="content">
                <div class="header_1 method blue">
                    <div class="break"><div></div></div>
                    <?php
                        $metoday = get_field('metoda_aktywizujaca', $post->ID);
                        if ($metoday && is_array($metoday)) {
    
                            // Pobierz informacje o polu ACF, aby uzyskać dostęp do jego konfiguracji
                            $field = get_field_object('metoda_aktywizujaca', $post->ID);
                            
                            // Przygotuj tablicę na etykiety
                            $selected_labels = array();
                            
                            // Przejdź przez wszystkie zaznaczone wartości
                            foreach ($metoday as $value) {
                                // Pobierz etykietę dla danej wartości z konfiguracji pola
                                if (isset($field['choices'][$value])) {
                                    $selected_labels[] = $field['choices'][$value];
                                }
                            }
                        }
                    ?>
                    <h2>Metoda aktywizująca: <small><?=implode(', ', $selected_labels)?></small></h2>
                </div>

                <div class="header_2 short_desc blue"><h3>KRÓTKA CHARAKTERYSTYKA:</h3></div>
                <p><?=get_field('krotka_charakterystyka', $post->ID)?></p>
                <div class="header_2 time blue"><h3>CZAS TRWANIA:</h3></div>


                <?php
                $chas = get_field_object('czas_trwania', $post->ID);
                $czas_trwania = '';
                if ($chas && is_array($chas)) {
                    $czas_trwania = $chas['choices'][$chas['value']];
                    
                }
                ?>
                <p><?=$czas_trwania?></p>
                <div class="header_2 targets blue"><h3>CELE:</h3></div>
                <?=get_field('cele_opis', $post->ID)?>

                <div class="header_1 content orange">
                    <div class="break"><div></div></div>
                    <h2>PRZEBIEG AKTYWNOŚCI</h2>
                </div>
                <?php $przebieg = get_field('przebieg_aktywnosci', $post->ID);?>
                <?php foreach ($przebieg as $key => $val): ?>
                <div class="header_2 ol orange" data-cnt="<?=($key+1)?>"><h3><?=$val['tytul']?> <small>(<?=$val['czas']?>)</small></h3></div>
                <div class="orange"><?=$val['opis']?></div>
                <?php endforeach; ?>

                <div class="header_1 materials blue">
                    <div class="break"><div></div></div>
                    <h2>Materiały:</h2>
                </div>
                <?= get_field('materialy', $post->ID);?>

                <div class="header_1 wskazowki blue"><div class="break"><div></div></div><h2>Wskazówki dla prowadzących:</h2></div>
                <?= get_field('wskazoki_dla_prowadzacych', $post->ID);?>
                
                <div class="header_1 downloads blue"><div class="break"><div></div></div><h2>Materiały do pobrania:</h2></div>
                <div class="downloads">
                    <?= get_field('materialy_do_pobrania', $post->ID);?>

                    
                    <?php 
                        $wideo = get_field('wideo_id', $post->ID);
                        $wideoId = extractYoutubeId($wideo);

                        if($wideoId):
                    ?>
                    <div class="video-container">
                        <!-- Zastąp "aw8cN_RHyWQ" swoim ID filmu -->
                        <iframe 
                            src="https://www.youtube.com/embed/<?=$wideoId?>?rel=0&showinfo=0&autoplay=0&mute=0"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                            allowfullscreen>
                        </iframe>
                    </div>
                    <?php endif;?>
                </div>

                <a class="backBtn" href="javascript:history.back();">
                    <span class="dashicons dashicons-arrow-left-alt"></span> Powrót
                </a>
            </div>
        </div>
    </div>
</div>