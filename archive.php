<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package shopline2018
 */

get_header(); ?>


    <div class="site-inner container">
        <div class="content-sidebar-wrap">
            <main class="content">
            <?php if ( have_posts() ) : ?>
                <div class="home-top"></div>
                <div class="home-middle">
                    <section class="section--articleList">
                        <div class="container">
                          <div class="section__title">
                            <?php
                                the_archive_title( '<h2 class="catalog--title"><i class="ico--new"></i><span>', '</h2>' );
                            ?>
                          </div>
                          <div class="row--articleList">
                            <div class="col">
                            <?php while ( have_posts() ) : the_post(); ?>

                                <?php
                                    get_template_part( 'content', get_post_format() );
                                ?>

                            <?php endwhile; ?>
                            </div>
                            <div class="ui--pagination">
                            <?php shopline2018_paging_nav(); ?>
                            </div>
                          </div>
                        </div>
                    </section>
                </div>
                <div class="home-bottom"></div>
            <?php else : ?>
                <?php get_template_part( 'content', 'none' ); ?>            
            <?php endif; ?>
            </main>
            <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?> 
            <?php get_sidebar(); ?>
            <?php endif; ?> 
        </div>
    </div>


<?php get_footer(); ?>
