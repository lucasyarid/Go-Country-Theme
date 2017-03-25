<?php 
	get_header();
?>

<div class="wrapper passeios-turisticos-single">
	<div class="passeios-turisticos" id="content" tabindex="-1">

		<div class="header-cover" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
			<article class="banner-content container">
				<section class="passeios-turisticos-title">
					<h1><?php the_title(); ?></h1>
					<h2>
						<?php if( get_field('description') ):
							the_field('description');
						endif; ?>	
					</h2>			
				</section>
			</article>
		</div>
		
		<?php while ( have_posts() ) : the_post(); ?>		

		<div class="line-fix-container scrollFixed"><div class="line-fix"></div></div>
		<div class="container">
			<div class="passeios-turisticos-main">
				<div class="passeios-turisticos-topBar scrollFixed">
					<?php if( get_field('duration') ): ?>
						<div class="topBarItem passeios-turisticos-duration">
							<div class="topBarItem-img">
								<img src="/~gots/wp-content/uploads/time.png" alt="Duração">
							</div>
							<div class="topBarItem-content">
								<div class="topBarItem-content-title">Duração</div>
								<div class="topBarItem-content-description"><?php the_field('duration'); ?></div>			
							</div>
						</div>
					<?php endif; ?>
					<?php if( get_field('limit') ): ?>
						<div class="topBarItem passeios-turisticos-limit">
							<div class="topBarItem-img">
								<img src="/~gots/wp-content/uploads/group.png" alt="Limite">
							</div>
							<div class="topBarItem-content">
								<div class="topBarItem-content-title">Limite</div>
								<div class="topBarItem-content-description"><?php the_field('limit'); ?></div>			
							</div>
						</div>
					<?php endif; ?>
					<?php if( get_field('price') ): ?>
						<div class="topBarItem passeios-turisticos-price">
							<div class="topBarItem-img">
								<img src="/~gots/wp-content/uploads/money.png" alt="Preço">
							</div>
							<div class="topBarItem-content">
								<div class="topBarItem-content-title">Preço</div>
								<div class="topBarItem-content-description">
									<?php 
										$price = get_field('price');
										echo str_repeat("£", $price);
										echo str_repeat("<span class='priceEmpty'>£</span>", 5 - $price);
									?>
								</div>			
							</div>
						</div>
					<?php endif; ?>
				</div>

				<div class="passeios-turisticos-content">
					<h3>Descrição do Passeio</h3>
					<?php the_content(); ?>
					<?php $galleryID = get_field('unite-gallery-category-id');
						if( $galleryID ): ?>
							<div id="passeios-turisticos-gallery" class="passeios-turisticos-gallery">
								<div class="col-sm-12">
									<div>
										<?php putUniteGallery('passeiosTuristicos', $galleryID ); ?>
									</div>
								</div>
							</div>
					<?php endif; ?>
				</div>
			</div>

			<div class="passeios-turisticos-sidebar scrollFixed">
				<div class="passeios-turisticos-form">
					<div class="passeios-turisticos-form-box">
						<div class="passeios-turisticos-form-img">
							<img src="/~gots/wp-content/uploads/date.png" alt="Data">
						</div>
						<div class="passeios-turisticos-form-content">
							<div class="passeios-turisticos-form-title">Solicite um <b>Orçamento</b></div>						
						</div>
					</div>
					<div id="scrollStop" class="passeios-turisticos-form-gravity">
						<div class="passeios-turisticos-form-description">
							Preencha o formulário abaixo para solicitar um orçamento:
						</div>
						<?php echo do_shortcode('[gravityform id=3 title=false description=false]'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="passeios-turisticos-advantages">
			<div class="container">
				<div class="passeios-turisticos-advantages-title">Vantagens</div>
				<div class="passeios-turisticos-advantages-list">
					<?php
					$tax = 'passeios_turisticos_vantagens';

					// get the terms of taxonomy
					$terms = get_terms( $tax, [
						'hide_empty' => true,
					]);

					// loop through all terms
					$i = 0;
					foreach( $terms as $term ) {
						if ($i % 2 == 0) { ?>
							<div class="row">
						<?php }
								$icon = get_field('icon', $term); ?>
								<div class="passeios-turisticos-advantages-item">
									<div class="passeios-turisticos-advantages-icon">
										<img src="<?php echo $icon[url]; ?>" alt="<?php echo $icon[alt]; ?>">
									</div>
									<div class="passeios-turisticos-advantages-text">
										<h4><?php echo $term->name; ?></h4>
									</div>
								</div>

						<?php if ($i % 2 != 0) { ?>
							</div>
						<?php }	
						$i++;
					} ?>
				</div>
			</div>
		</div>

		<?php endwhile; ?>

	</div>
</div>

<?php get_footer(); ?>