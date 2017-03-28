<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Go_Country_Theme
 */

?>
<?php
	$background_image;
	if (has_post_thumbnail()) {
		$background_image = get_the_post_thumbnail_url();
	} else {
		$background_image = '/~gots/wp-content/uploads/search-passeios-turisticos.jpg';
	}
?>

<div class="wrapper page" id="wrapper-index">
	<div id="content" tabindex="-1">

		<div class="header-cover" style="background-image: url('<?php echo $background_image ?>');">
			<article class="banner-content container">
				<section class="page-title">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>	
				</section>
			</article>
			<div class="container">
				<?php if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<p class="breadcrumbs" id="breadcrumbs">','</p>');
				} ?>
			</div>
		</div>

		<div class="container">
			<div class="page-main">
				<?php the_content(); ?>	
			</div>
		</div>

	</div>
</div>