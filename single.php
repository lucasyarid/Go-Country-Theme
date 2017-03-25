<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Go_Country_Theme
 */

get_header(); ?>
		<div id="primary" class="content-area">
			<main id="main" class="blog post" role="main">

			<div class="header-cover" style="background-image: url('/~gots/wp-content/uploads/blog.jpg');">
				<article class="container">
					<section class="blog-title">
						<h1><?php the_title(); ?></h1>
						<h2><?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?></h2>			
					</section>
				</article>
			</div>

			<div class="blog-container container">
				<div class="blog-sidebar">
					<?php get_sidebar(); ?>
				</div>
				<?php
				if ( have_posts() ) : ?>

						<article id="post-single-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="post-single-container">
								<div class="post-date">
									<div class="post-date-full">
										<?php echo get_the_date('d');?> de <?php echo get_the_date('F');?> de <?php echo get_the_date('y');?>
									</div>
								</div>
								<div class="post-text">
									<div class="entry-content">
										<?php the_content(); ?>
									</div>	
								</div>
							</div>	
						</article><!-- #post-## -->

					<?php

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
			</div>
			
			</main><!-- #main -->
		</div><!-- #primary -->

<?php
get_footer();