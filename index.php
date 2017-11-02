<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Candidate
 */

get_header(); ?>

				<main role="main" class="col-md-8 site-main" data-spy="scroll" data-target="#mainNavigation" data-offset="0">

					<?php
						// WP_Query arguments
						$args = array(
							'post_type'              => array( 'personal_information' ),
							'posts_per_page'         => '1',
						);
						
						// The Query
						$query = new WP_Query( $args );
						
						// The Loop
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post();
								get_template_part( 'template-parts/content-personal_information', get_post_format() );
							}
						} else {
							// no posts found
						}
						
						// Restore original Post Data
						wp_reset_postdata();
					?>

					<?php
						// WP_Query arguments
						$args = array(
							'post_type'              => array( 'work_experience' ),
							'posts_per_page'         => '-1',
						);
						
						// The Query
						$query = new WP_Query( $args );
						
						// The Loop
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post();
								get_template_part( 'template-parts/content-work_experience', get_post_format() );
							}
						} else {
							// no posts found
						}
						
						// Restore original Post Data
						wp_reset_postdata();
					?>
				  
					<?php
						// WP_Query arguments
						$args = array(
							'post_type'              => array( 'education' ),
							'posts_per_page'         => '-1',
						);
						
						// The Query
						$query = new WP_Query( $args );
						
						// The Loop
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post();
								get_template_part( 'template-parts/content-education', get_post_format() );
							}
						} else {
							// no posts found
						}
						
						// Restore original Post Data
						wp_reset_postdata();
					?>				  

					<?php
						// WP_Query arguments
						$args = array(
							'post_type'              => array( 'skills' ),
							'posts_per_page'         => '1',
						);
						
						// The Query
						$query = new WP_Query( $args );
						
						// The Loop
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post();
								get_template_part( 'template-parts/content-skills', get_post_format() );
							}
						} else {
							// no posts found
						}
						
						// Restore original Post Data
						wp_reset_postdata();
					?>
				  
				  <?php
				  if ( have_posts() ) :
		  
					  if ( is_home() && ! is_front_page() ) : ?>
						  <header>
							  <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						  </header>
		  
					  <?php
					  endif;
		  
					  /* Start the Loop */
					  while ( have_posts() ) : the_post();
		  
						  /*
						   * Include the Post-Format-specific template for the content.
						   * If you want to override this in a child theme, then include a file
						   * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						   */
						  get_template_part( 'template-parts/content', get_post_format() );
		  
					  endwhile;
		  
					  the_posts_navigation();
		  
				  else :
		  
					  get_template_part( 'template-parts/content', 'none' );
		  
				  endif; ?>

			</main><!-- #main -->

<?php
get_sidebar();
get_footer();
