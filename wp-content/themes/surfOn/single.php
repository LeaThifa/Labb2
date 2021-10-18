<?php

get_header(); 

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<h2 class="employee-title"><?php the_title(); ?></h2>
            
        <a href="<?php echo get_permalink(); ?>">
            <img src="<?php echo the_post_thumbnail_url("medium-large"); ?>" alt="<?php the_title(); ?>">
		</a>
		
   
        <ul class="employee-info"> 
            <li><b class="employee-bullet">Title:</b> </br> <?php the_field("job_title"); ?> </li>
            <li><b class="employee-bullet">Name:</b> </br> <?php the_field("first_name"); echo str_repeat('&nbsp;', 1); the_field("last_name"); ?></li>
            <li><b class="employee-bullet">Last name:</b> </li>
            <li><b class="employee-bullet">Email:</b></br> <?php the_field("email"); ?> </li>
            <li><b class="employee-bullet">Phone:</b></br> <?php the_field("phone"); ?> </li>
            <li><b class="employee-bullet">Additional information:</b></br> <?php the_field("additional_information"); ?> </li>
		</ul>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
