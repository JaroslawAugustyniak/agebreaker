<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="content">
                <div class="in">
                    
                    <?php 
                        $wideo = $args['wideo_id'];
                        $wideoId = extractYoutubeId($wideo);

                        if($wideoId):
                    ?>
                    <div class="video-container">
                        <!-- Zastąp "aw8cN_RHyWQ" swoim ID filmu -->
                        <iframe 
                            src="https://www.youtube.com/embed/<?=$wideoId?>?rel=0&showinfo=0&autoplay=0&mute=0&enablejsapi=1"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                            allowfullscreen>
                        </iframe>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if(!$args['hide_break']):?>
    <div class="break full"><div></div></div>
<?php endif;?>