<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Candidate
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

		  			<aside id="secondary" class="widget-area col-md-3 ml-sm-auto site-sidebar">
						<?php dynamic_sidebar( 'sidebar-1' ); ?>
                        <div class="sidebar-module sidebar-module-inset">
                            <h4>JOB APPLIED FOR POSITION PREFERRED JOB STUDIES APPLIED FOR personal statement</h4>
                            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                        </div>
                        <div class="sidebar-module">
                        	<h4>Annexes</h4>
                            <ol class="list-unstyled">
                            	<li><a href="#">GitHub</a></li>
                                <li><a href="#">Twitter</a></li>
                                <li><a href="#">Facebook</a></li>
                            </ol>
                        </div>					  
		  			</aside><!-- #secondary .site-sidebar -->
