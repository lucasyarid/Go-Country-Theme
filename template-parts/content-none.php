<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Go_Country_Theme
 */

?>

<section class="no-results not-found">
	<header class="page-header container">
		<h2 class="search-title"><?php esc_html_e( 'Nenhuma página encontrada', 'co-country-theme' ); ?></h2>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'co-country-theme' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<div class="container">
				<p><?php esc_html_e( 'Desculpe, não encontramos resultados em sua pesquisa.', 'co-country-theme' ); ?></p>
			</div>

		<?php else : ?>

			<div class="container">
				<p><?php esc_html_e( 'Parece que não encontramos o que procura.' ); ?></p>
			</div>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
