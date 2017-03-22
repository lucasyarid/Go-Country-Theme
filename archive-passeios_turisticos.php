<?php
/**
 * Template Name: Passeios Turísticos
 * The template for the archive page.
 *
 */
?>

<?php 
	get_header();

?>

<div class="wrapper passeios-turisticos-archive" id="wrapper-index">
	<div class="container" id="content" tabindex="-1">
		<div class="row passeios-turisticos">

				<?php
				if ( have_posts() ) : ?>

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();


					endwhile;

					the_posts_navigation();

				else :

					echo "<h2>Nenhum passeio encontrado.</h2>"

				endif; ?>

		</div>
	</div>
</div>

<script type="text/javascript">

var images = ['fundo09-PB.jpg'];

jQuery('#wrapper-index').css({'background-image': 'url(/wp-content/uploads/Exhibitions-background/' + images[Math.floor(Math.random() * images.length)] + ')'});

</script>

<?php get_footer(); ?>