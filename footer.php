<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Go_Country_Theme
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">		
		<div class="footer-top">
			<div class="container">
				<ul>
					<?php
						$x = 1;
						while( $x <= 4) {
							?>
							<li class="footer-item">
								<?php dynamic_sidebar( 'footer-'.$x ); ?>
							</li>						
							<?php
							$x++;
						}				
					?>
				</ul>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="footer-bottom-links">
					<div class="footer-bottom-menu">
						<?php wp_nav_menu( array( 'theme_location' => 'menu-2', 'menu_id' => 'footer-menu' ) ); ?>
					</div>
					<div class="footer-bottom-signature">
						Desenvolvido por <b>DipDesign</b>
					</div>
				</div>
				<div class="footer-bottom-cards">
					<div class="footer-bottom-cards-container">
						<img src="/~gots/wp-content/uploads/visa-electron.png" alt="Visa Electron">
						<img src="/~gots/wp-content/uploads/visa.png" alt="Visa">
						<img src="/~gots/wp-content/uploads/paypal.png" alt="Paypal">
						<img src="/~gots/wp-content/uploads/mastercard.png" alt="Mastercard">
						<img src="/~gots/wp-content/uploads/amex.png" alt="Amex">
						<img src="/~gots/wp-content/uploads/delta.png" alt="Delta">
						<img src="/~gots/wp-content/uploads/maestro.png" alt="Maestro">
						<img src="/~gots/wp-content/uploads/wu.png" alt="Western Union">
					</div>
				</div>
			</div>				
		</div>	
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
