<?php
/**
 * Template Name: Home
 * The template for home.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Go_Country_Theme
 */

get_header(); ?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<div class="header-cover" style="background-image: url('/~gots/wp-content/uploads/index.jpg');">
				<article class="banner-content container">
					<section>
						<div class="banner-content-title">
							<b>go ESCÓCIA:</b> descubra
							os <b>melhores</b> lugares
							da <b>ESCÓCIA!</b>
						</div>
						<div id="show-form-button" class="banner-form-button">Solicite um Orçamento</div>				
						<div id="show-form" class="banner-form">
							<div class="banner-form-container">
								<h2>Solicite um Orçamento</h2>
								<?php echo do_shortcode('[gravityform id=1 title=false]'); ?>
							</div>
						</div>
					</section>
				</article>
				<div id="scroll-bottom" class="scroll-bottom">
					<img src="/~gots/wp-content/uploads/scroll.png" alt="Scroll Bottom">
				</div>
			</div>

			<div id="afterScroll" class="passeios-turisticos-archive">
				<div class="container-large">
					<h2 class="passeios-turisticos-index-title">Passeios turísticos</h2>
					<div class="passeios-turisticos-archive-itens">
						<?php $query = new WP_Query( array(
							'post_type' => 'passeios_turisticos',
							'posts_per_page' => 6
						) );
						$i = 0;
						if ( $query->have_posts() ) :
							while ( $query->have_posts() ) : $query->the_post(); 
								
								/* Start the Loop */
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
						endwhile; wp_reset_postdata(); ?>
						<?php else : ?>
							<!-- show 404 error here -->
						<?php endif; ?>
					</div>
					<a href="/~gots/passeios_turisticos/" class="passeios-turisticos-show-more">
						<span>Veja todos os pacotes</span>
					</a>		
				</div>			
			</div>

			<div class="transfer-container container">
				<div class="transfer-img" style="background-image: url('/~gots/wp-content/uploads/transfer.jpg');"></div>
				<div class="transfer-text">
					<h2>Transfer</h2>
					<p>Seja recepcionado nos aeroportos da Escócia, por uma equipe especializada em traslados executivos e em proporcionar conforto e segurança aos seus clientes.</p>
					<a href="/~gots/transfer/" class="transfer-button">Conheça nossas opções de transfer</a>
				</div>
			</div>

			<div class="blog-container">
				<div class="blog-posts">
					<div class="blog-posts-cover" style="background-image: url('/~gots/wp-content/uploads/index-posts.jpg');"></div>
					<div class="container">
						<h2 class="blog-posts-title">novidades dA ESCÓCIA</h2>
						<div class="blog-posts-itens">
							<div class="row">
								<?php $query = new WP_Query( array(
									'post_type' => 'post',
									'posts_per_page' => 3
								) );

								if ( $query->have_posts() ) :
									while ( $query->have_posts() ) : $query->the_post(); ?>
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
										</article>									
									<?php endwhile; wp_reset_postdata(); ?>
								<?php else : ?>
									<!-- show 404 error here -->
								<?php endif; ?>
							</div>
							<a href="/~gots/blog/" class="blog-posts-show-more">
								<span>Veja todas as notícias</span>
							</a>				
						</div>
					</div>
				</div>
			</main><!-- #main -->
		</div><!-- #primary -->

<?php
get_footer();
