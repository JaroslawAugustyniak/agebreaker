<?php
/**
 * Szablon wyników dla Search & Filter Pro
 * 
 * Skopiuj ten plik do folderu twojego motywu:
 * wp-content/themes/your-theme/search-filter/results.php
 */

// Upewnij się, że nikt nie ma bezpośredniego dostępu do tego pliku
if (!defined('ABSPATH')) {
    exit;
}

if ($query->have_posts()) {
    ?>
    <div class="custom-search-results">
        <div class="result-count">
            <?php echo 'Znaleziono ' . $query->found_posts . ' wyników'; ?>
        </div>
        
        <div class="results-grid">
            <?php
            while ($query->have_posts()) {
                $query->the_post();
                
                // Rozpocznij element wyniku
                ?>
                <div class="result-item">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="result-image">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    
                    <div class="result-content">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    
                        <div class="result-excerpt">
                            <?= get_field('krotka_charakterystyka') ?>
                        </div>
                        
                    </div>
                </div>
                <?php
            }
            wp_reset_postdata();
            ?>
        </div>
        
        <!-- Pagination - domyślna paginacja zostanie dostosowana przez CSS -->
        <div class="pagination">
        <?php
            // Wyświetla paginację jeśli jest dostępna
            if ($query->max_num_pages > 1) {
                // Używamy formatu /page/X zamiast parametru sf_paged
                $big = 999999999;
                echo paginate_links(array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => 'page/%#%',
                    'current' => max(1, $query->query['paged']),
                    'total' => $query->max_num_pages,
                    'prev_text' => '« Poprzednia',
                    'next_text' => 'Następna »',
                ));
            }
            ?>
        </div>
    </div>
    <?php
} else {
    // Brak wyników
    ?>
    <div class="no-results">
        <h2>Nie znaleziono wyników</h2>
        <p>Przepraszamy, ale nie znaleźliśmy żadnych wyników pasujących do Twoich kryteriów wyszukiwania.</p>
        <p>Spróbuj zmienić kryteria wyszukiwania lub <a href="<?php echo home_url(); ?>">wróć do strony głównej</a>.</p>
    </div>
    <?php
}
?>
