<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Inwenta
 */
$current_page = get_page_by_path($_SERVER['REQUEST_URI']);


get_header();

?>
	<div class="header-size"></div>
	<main id="primary" class="site-main">

		<?php
		if ( have_posts() ) :

			// get_template_part( 'template-parts/content', 'page' );

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			
			endif;



			?>
			<section id="pagenews_<?=$current_page->ID?>" class="news">
				<?php get_template_part( 'template-parts/template', 'news', $current_page);?>
			</section>
			<div class="container">
			<ul class="news-posts d-none">
			<?php 
			
			/* Start the Loop */	
			while ( have_posts() ) :
				the_post();
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				 ?>
				<li class="news-item d-none">
				 	<?php get_template_part( 'template-parts/content-item', get_post_type() );?>
				</li>

			<?php endwhile;

			?>
			</ul>
			
			<?php
				$content = $current_page->post_content;
				$content = apply_filters( 'the_content', $content );
				$content = str_replace( ']]>', ']]&gt;', $content );
				echo $content;
			?>

		</div>
			<?php 

			// the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->
		
	<?php get_template_part( 'template-parts/template', 'sections', $current_page);?>

	<div id="scroll" class="d-none">  
	<?php include (get_template_directory().'/images/scroll.svg');?>
	</div>

<?php
// get_sidebar();
get_footer();
