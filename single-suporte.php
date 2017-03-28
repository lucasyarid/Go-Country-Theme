<?php 
	get_header();
?>

<div class="wrapper suporte-single">
	<div class="suporte" id="content" tabindex="-1">

		<div class="header-cover" style="background-image: url('/~gots/wp-content/uploads/suporte.jpg');">
			<article class="banner-content container">
				<section class="suporte-title">
					<h1>Ajuda & Suporte</h1>		
				</section>
			</article>
			<div class="container">
				<?php if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<p class="breadcrumbs" id="breadcrumbs">','</p>');
				} ?>
			</div>
		</div>	

		<div class="single-container container">
			<div class="single-posts">
				<?php while ( have_posts() ) : the_post(); ?>	
					<article id="post-single-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="post-single-container">
							<div class="post-text">
								<div class="post-title">
									<h2><?php the_title(); ?></h2>
								</div>
								<div class="entry-content">
									<?php the_content(); ?>
								</div>	
							</div>
						</div>	
					</article><!-- #post-## -->
				<?php endwhile; ?>
			</div>

			<div class="single-sidebar">
				<?php $query = new WP_Query( array( 'post_type' => 'suporte' ) );                

				if ( $query->have_posts() ) : ?>
				    <?php while ( $query->have_posts() ) : $query->the_post(); ?>   
				        <div class="sidebar-content">
				        	<?php 
				        		$current_url = home_url(add_query_arg(array(),$wp->request));
				        		$link_url = rtrim(get_the_permalink(),'/');
				        		if ($current_url == $link_url) {
				        			$currentPage = "class='current-page'";
				        		} else {
				        			$currentPage = '';
				        		}			        		
				        	?>
				        	<a href="<?php the_permalink(); ?>" <?php echo $currentPage; ?>>				        		
				        		<?php the_title(); ?>
				        	</a>
				        </div>
				    <?php endwhile; wp_reset_postdata(); ?>
				<!-- show pagination here -->
				<?php else : ?>
				    <!-- show 404 error here -->
				<?php endif; ?>
			</div>
		</div>

	</div>
</div>

<?php get_footer(); ?>