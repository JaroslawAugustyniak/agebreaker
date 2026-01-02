<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Inwenta
 */

 global $post;


 $page = $post;
?>

		</main>
	</div><!-- #sections -->
</div><!-- #page -->

<?php wp_footer(); ?>
<div id="cookieAcceptBar" class="cookieAcceptBar d-none">
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				Używamy plików cookies na naszej stronie internetowej. Kontynuując korzystanie z naszej strony internetowej, 
				bez zmiany ustawień prywatności przeglądarki, wyrażasz zgodę na przetwarzanie Twoich danych osobowych takich jak adres IP czy identyfikatory plików cookies w celach marketingowych, 
				w tym wyświetlania reklam dopasowanych do Twoich zainteresowań i preferencji, 
				a także celach analitycznych i statystycznych, 
				a także na zapisywanie i przechowywanie plików cookies na Twoim urządzeniu. 
				Pamiętaj, że zawsze możesz zmienić ustawienia dotyczące plików cookies w swojej przeglądarce. 
			</div>
			<div class="col-md-2 valign-center align-center">	
				<button id="cookieAcceptBarConfirm" class="btn btn-success">Zaakceptuj i zamknij</button>
			</div>
		</div>
	</div>

</div>
<footer>
	<div class="break full"><div></div></div>
	<div class="page-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="cc">
						
						<span class="tool-icons">
							
							<img src="//creativecommons.org/wp-content/themes/vocabulary-theme/vocabulary/svg/cc/icons/cc-icons.svg#cc-logo" />
							
							<img src="//creativecommons.org/wp-content/themes/vocabulary-theme/vocabulary/svg/cc/icons/cc-icons.svg#cc-by" />
							
							<img src="//creativecommons.org/wp-content/themes/vocabulary-theme/vocabulary/svg/cc/icons/cc-icons.svg#cc-sa" />
						</span>
						<h4>Age Breaker © 2025 autorstwa WellHR podlega licencji Creative Commons <a href="https://creativecommons.org/licenses/by-sa/4.0/">CC BY-SA 4.0</a></h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

</body>
</html>
