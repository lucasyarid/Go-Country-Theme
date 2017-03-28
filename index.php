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
			<main id="main" class="blog" role="main">

			<div class="header-cover" style="background-image: url('/~gots/wp-content/uploads/blog.jpg');">
				<article class="container">
					<section class="blog-title">
						<h1>Blog</h1>
						<h2>Novidades do Reino Unido</h2>			
					</section>
				</article>
				<div class="container">
					<?php if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb('<p class="breadcrumbs" id="breadcrumbs">','</p>');
					} ?>
				</div>
			</div>

			<div class="blog-container container">				
				<div class="blog-posts">
					<?php
					if ( have_posts() ) : ?>

						<?php
						$i = 0;
						/* Start the Loop */
						while ( have_posts() ) : the_post(); 
							if ($i == 0) { ?>
								<div class="row">
						<?php } ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<a href="<?php the_permalink(); ?>">
									<div class="post-container">
										<div class="post-date">
											<div class="post-date-day"><?php echo get_the_date('d');?></div>
											<div class="post-date-month"><?php echo get_the_date('M');?></div>
										</div>
										<div class="post-image" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
										<div class="post-text">
											<header class="entry-header">
												<div class="post-title">
													<h2><?php the_title(); ?></h2>
													<h3><?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?></h3>
												</div>												
											</header>
											<div class="entry-excerpt">
												<?php the_excerpt(); ?>
											</div>
											<a href="<?php the_permalink(); ?>"><div class="post-button">Saiba Mais</div></a>		
										</div>
									</div>
								</a>			
							</article><!-- #post-## -->

						<?php if ($i == 1) { ?>
							</div>
						<?php
							$i = -1;
						}	
						$i++;
						endwhile;

						if(function_exists('wp_paginate')):
						    wp_paginate();  
						else :
							the_posts_navigation();
						endif;

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
				</div>
				<div class="blog-sidebar">
					<?php get_sidebar(); ?>
				</div>
			</div>
			
			</main><!-- #main -->
		</div><!-- #primary -->

<?php
get_footer();
