<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
            <h1 class="page-title">
				<?php
					echo str_replace('Archives: ','',get_the_archive_title()); 
                ?>
            </h1>
			</header><!-- .page-header -->
            <?php

while ( have_posts() ) :
	the_post();
?>
<div class="emp-container">
<div> 
<a href="<?php echo get_permalink(); ?>"> 
    <h2 class="emp-title"><?php the_title(); ?></h2>
    <img><?php the_post_thumbnail("shop_single"); ?></img>
</a>
</div> 
</div>

    <?php
endwhile;


else :

get_template_part( 'content', 'none' );

endif;
?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
