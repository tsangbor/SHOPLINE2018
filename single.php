<?php
/**
 * The template for displaying all single posts.
 *
 * @package shopline2018
 */

get_header(); ?>
    <section class="section--breadcrumb">
      <div class="container">
        <ul class="nav--breadcrumb">
            <?php shopline2018_breadcrumbs(); ?>
        </ul>
      </div>
    </section>  

    <div class="site-inner container">
        <div class="content-sidebar-wrap">
            <main class="content">
            <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'content', 'single' ); ?>

            <?php endwhile; // end of the loop. ?>
            </main>
          <?php get_sidebar(); ?>
        </div>
    </div>




<?php get_footer(); ?>
