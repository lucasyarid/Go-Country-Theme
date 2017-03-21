<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Go_Country_Theme
 */

get_header(); ?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<div class="header-cover">
				<article class="banner-content container">
					<section>
						<div class="banner-form">
							<h2>Solicite um Orçamento</h2>
							<?php echo do_shortcode('[gravityform id=1 title=false]'); ?>
						</div>
						<div class="banner-content-title">
							<b>go SCOTLAND:</b> descubra
							os <b>melhores</b> lugares
							da <b>ESCÓCIA!</b>
						</div>						
					</section>
				</article>
				<div id="scroll-bottom" class="scroll-bottom">
					<img src="/~gots/wp-content/uploads/scroll.png" alt="Scroll Bottom">
				</div>
			</div>

			<?php
			if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) : ?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>

				<?php
				endif;

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );

				endwhile;

				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->

<?php
get_footer();
