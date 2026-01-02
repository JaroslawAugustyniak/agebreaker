
    <div class="container">

<?php


global $post;
                            if( sizeof($args['lista-wyrazen']) > 0):
                                          foreach( $args['lista-wyrazen'] as $key=>$wyr ): 
                                          ?>
                                          <?php 
                                                 $pytanie = $wyr['wyrazenie'];
                                                 $odpowiedz = $wyr['definicja'];
                                          ?>
                                                 
                                                 <div class="item">
                                                        <div class="question"><?=$pytanie?></div>
                                                        <div class="answer"><?=$odpowiedz?></div>
                                                 </div>
                                          <?php
                                          endforeach;
                                   endif;
                            ?>

</div>                            