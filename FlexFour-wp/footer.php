<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package opsv3
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="w-container">
			<div class="w-row">
				<!-- Navigation-->
				<div class="w-col w-col-4 w-col-medium-4 w-col-small-6 w-col-tiny-12">
                    <div class="footer-box">
					   <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('footer_widget_1') ) ?>
                    </div>
				</div>
				<!-- Social Media-->
				<div class="w-col w-col-4 w-col-medium-4 w-col-small-6 w-col-tiny-12">
                    <div class="footer-box">
    					<h3>Find Us Online</h3>
    					<?php get_template_part('template-parts/social','icons'); ?>
                    </div>
				</div>
				<!-- Accepted Payment Types-->
				<div class="w-col w-col-4 w-col-medium-4 w-col-small-12 w-col-tiny-12">
                    <div class="footer-box">
                        <h3>Accepted Payment Types</h3>
                        <div class="payment-types">                        
                            <?php get_template_part('template-parts/payment-types'); ?>
                        </div>
                        <div class="payment-gateway">                        
                            <?php get_template_part('template-parts/payment-gateway'); ?>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
	 <div class="row sub__footer">
        <div class="wrapper">
            <div class="sml-c12 center">
                <span class="copyright white-text">Powered by the <a title="OPS Web to print solution"<?php if(!is_front_page()): ?> rel="nofollow"<?php endif; ?>  target="_blank" class="white-text" href="http://www.onlineprintsolution.co.uk/">Online Print Solution</a>
      		| &copy; <?= strftime('%Y'); ?> <?php echo get_theme_mod( 'copyright_textbox', 'Your Company Name' ); ?></span>
            </div>
        </div>
    </div>
</div><!-- #page -->

<?php wp_footer(); ?>
<!-- TOOL TIPS -->
<?php 

get_template_part('template-parts/footer','flexible-content');
get_template_part('template-parts/footer','flexible-content-theme');
?>

</body>
</html>