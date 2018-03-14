<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package shopline2018
 */

get_header(); ?>

      <div class="site-inner container">
        <div class="content-sidebar-wrap">
          <main class="content">
            <div class="home-top"></div>
            <div class="home-middle">

                <?php while ( have_posts() ) : the_post(); ?>
    
                    <?php get_template_part( 'content', 'page' ); ?>

                    <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                    ?>
    
                <?php endwhile; // end of the loop. ?>
                

            </div>
            <div class="home-bottom"></div>
          </main>
            <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?> 
            <?php get_sidebar(); ?>
            <?php endif; ?> 
        </div>
      </div>


<?php get_footer(); ?>
