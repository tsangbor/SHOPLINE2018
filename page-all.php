<?php
/**
Template Name: All Posts Page
 *
 * @package shopline2018
 */

get_header(); ?>



      <div class="site-inner container">
        <div class="content-sidebar-wrap">
          <main class="content">
            <div class="home-top"></div>
            <div class="home-middle">
              <section class="section--articleList">
                <div class="container">
                	<?php if( get_theme_mod( 'active_newest' ) == '') : ?> 
						<div class="section__title">
							<h2 class="catalog--title"><i class="ico--new"></i><span><?php echo esc_html( get_theme_mod( 'newest_text' )); ?> </span></h2>
						</div>
						<div class="row--articleList is-list-all">

						<?php query_posts( array ( 'post_type' => 'post' ) );
			            	while ( have_posts() ) : the_post(); 
							?> 
							<div id="post-<?php the_ID(); ?>" <?php post_class('col'); ?> >
							  <div class="card--article">
							  	<a class="card__img" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('global-thumb'); ?></a>
							    <div class="card__caption">
							      <div class="tagsDate">
									<?php shopline2018_posted_on();?>
							      </div>
							      <div class="caption"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></div>
							    </div>
							  </div>
							</div>
			                    
						<?php endwhile; // end of the loop. ?> 
                            <div class="ui--pagination">
                            <?php shopline2018_paging_nav(); ?>
                            </div>
						</div>
					<?php endif; ?>

                </div>
              </section>
            </div>
            <div class="home-bottom"></div>
          </main>

			<?php get_sidebar(); ?>
        </div>
      </div>





<?php get_footer(); ?>
