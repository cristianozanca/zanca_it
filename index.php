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
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<?php if ( is_home() && ! is_front_page() ) : ?>
		<header class="page-header">
			<h1 class="page-title"><?php single_post_title(); ?></h1>
		</header>
	<?php else : ?>

		<div id="boxi-container">
			<?php dynamic_sidebar( 'left-box' ); ?>
			<?php dynamic_sidebar( 'right-box' ); ?>
			<?php dynamic_sidebar( 'center-box' ); ?>

		</div>

	<header class="page-header">

		<div id="Page_Training" style="display: none;" class="content-area"><strong>Training</strong>
			<?php echo do_shortcode("[post-content id='676']");?> </div>
		<div id="Page_Support" style="display: none;" class="content-area"><strong>Support</strong>
			<?php echo do_shortcode("[post-content id='673']");?>   </div>
		<div id="Page_Ecommerce" style="display: none;" class="subbox_ecommerce"><strong>eCommerce</strong>
			<?php echo do_shortcode("[supsystic-price-table id='9']");?>


		</div>


		<h2 class="page-title"><?php _e( 'Posts', 'twentyseventeen' ); ?></h2>
	</header>
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/post/content', get_post_format() );

				endwhile;

				the_posts_pagination( array(
					'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span><span class="dashicons dashicons-controls-back"></span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span><span class="dashicons dashicons-controls-forward"></span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
				) );

			else :

				get_template_part( 'template-parts/post/content', 'none' );

			endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->
<script>
	jQuery(function () {
		jQuery('.expander_training').live('click', function () {
			jQuery('#Page_Training').slideToggle();
			jQuery('#Page_Support').hide();
			jQuery('#Page_Ecommerce').hide();

		});
	});
	jQuery(function () {
		jQuery('.expander_support').live('click', function () {
			jQuery('#Page_Support').slideToggle();
			jQuery('#Page_Training').hide();
			jQuery('#Page_Ecommerce').hide();
		});
	});
	jQuery(function () {
		jQuery('.expander_ecommerce').live('click', function () {
			jQuery('#Page_Ecommerce').slideToggle();
			jQuery('#Page_Support').hide();
			jQuery('#Page_Training').hide();
		});
	});

</script>
<?php get_footer();
