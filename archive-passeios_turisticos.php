<?php 
	get_header();

?>

<div class="wrapper passeios-turisticos-archive" id="wrapper-index">
	<div id="content" tabindex="-1">
		<div class="row passeios-turisticos">

			<div class="header-cover" style="background-image: url('/~gots/wp-content/uploads/passeios-turisticos.jpg');">
				<article class="banner-content container">
					<section class="passeios-turisticos-title">
						<h1>Passeios Turísticos</h1>		
					</section>
				</article>
			</div>

			<div class="container-large">
				<?php if ( have_posts() ) : 
					$i = 0;
					/* Start the Loop */
					while ( have_posts() ) : the_post(); 
						if ($i == 0) { ?>
							<div class="row">
					<?php } ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<a href="<?php the_permalink(); ?>">
								<div class="passeios-turisticos-container passeios-turisticos-container-<?php echo $i+1 ?>" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">							
									<header class="entry-header">
										<div class="passeios-turisticos-text">
											<h2><?php the_title(); ?></h2>
											<h3><?php the_field('description'); ?></h3>
										</div>
										<div class="passeios-turisticos-button">Consultar</div>
									</header><!-- .entry-header -->
								</div>
							</a>			
						</article><!-- #post-## -->

					<?php if ($i == 2) { ?>
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

		</div>
	</div>
</div>

<?php get_footer(); ?>