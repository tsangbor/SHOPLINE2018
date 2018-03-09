<?php
/**
Template Name: Home Page
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
						<div class="row--articleList">

						<?php query_posts( array ( 'post_type' => 'post', 'posts_per_page' => 3 ) );
			                $i=0; 
			            	while ( have_posts() ) : the_post(); 
				
							?> 
							<div id="post-<?php the_ID(); ?>" <?php if($i>0){post_class('col');}else{post_class('col--full');} ?> >
							  <div class="card--article">
							  	<a class="card__img" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('global-thumb'); ?></a>
							    <div class="card__caption">
							      <div class="tagsDate">
									<?php shopline2018_posted_on();?>
							      </div>
							      <div class="caption"><?php $content = get_the_title(); $trimmed_content = wp_trim_words( $content, 35, '<a href="'. get_permalink() .'"> ...</a>' ); echo $trimmed_content; ?></div>
							    </div>
							  </div>
							</div>
			                    
						<?php $i++; endwhile; // end of the loop. ?> 

						</div>
					<?php endif; ?>

                  <div class="section__title">
                    <h2 class="catalog--title"><i class="ico--marketingshare"></i><span>網店行銷分享</span></h2>
                  </div>
                  <div class="row--articleList">
						<?php query_posts( array ( 'post_type' => 'post', 'posts_per_page' => 3, 'cat' => 211) );
			                $i=0; 
			            	while ( have_posts() ) : the_post(); 
				
							?> 
							<div id="post-<?php the_ID(); ?>" <?php if($i>0){post_class('col');}else{post_class('col--full');} ?> >
							  <div class="card--article">
							  	<a class="card__img" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('global-thumb'); ?></a>
							    <div class="card__caption">
							      <div class="tagsDate">
									<?php shopline2018_posted_on();?>
							      </div>
							      <div class="caption"><?php $content = get_the_title(); $trimmed_content = wp_trim_words( $content, 35, '<a href="'. get_permalink() .'"> ...</a>' ); echo $trimmed_content; ?></div>
							    </div>
							  </div>
							</div>
			                    
						<?php $i++; endwhile; // end of the loop. ?> 
                  </div>
                  <div class="section__title">
                    <h2 class="catalog--title"><i class="ico--caseshare"></i><span>品牌案例分享</span></h2>
                  </div>
                  <div class="row--articleList">
						<?php query_posts( array ( 'post_type' => 'post', 'posts_per_page' => 3, 'cat' => 5) );
			                $i=0; 
			            	while ( have_posts() ) : the_post(); 
				
							?> 
							<div id="post-<?php the_ID(); ?>" <?php if($i>0){post_class('col');}else{post_class('col--full');} ?> >
							  <div class="card--article">
							  	<a class="card__img" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('global-thumb'); ?></a>
							    <div class="card__caption">
							      <div class="tagsDate">
									<?php shopline2018_posted_on();?>
							      </div>
							      <div class="caption"><?php $content = get_the_title(); $trimmed_content = wp_trim_words( $content, 35, '<a href="'. get_permalink() .'"> ...</a>' ); echo $trimmed_content; ?></div>
							    </div>
							  </div>
							</div>
			                    
						<?php $i++; endwhile; // end of the loop. ?> 
                  </div>
                  <div class="section__title">
                    <h2 class="catalog--title"><i class="ico--shopfeature"></i><span>最新電商功能</span></h2>
                  </div>
                  <div class="row--articleList">
						<?php query_posts( array ( 'post_type' => 'post', 'posts_per_page' => 3, 'cat' => 4) );
			                $i=0; 
			            	while ( have_posts() ) : the_post(); 
				
							?> 
							<div id="post-<?php the_ID(); ?>" <?php if($i>0){post_class('col');}else{post_class('col--full');} ?> >
							  <div class="card--article">
							  	<a class="card__img" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('global-thumb'); ?></a>
							    <div class="card__caption">
							      <div class="tagsDate">
									<?php shopline2018_posted_on();?>
							      </div>
							      <div class="caption"><?php $content = get_the_title(); $trimmed_content = wp_trim_words( $content, 35, '<a href="'. get_permalink() .'"> ...</a>' ); echo $trimmed_content; ?></div>
							    </div>
							  </div>
							</div>
			                    
						<?php $i++; endwhile; // end of the loop. ?> 
                  </div>
                </div>
              </section>
            </div>
            <div class="home-bottom"></div>
          </main>

			<?php get_sidebar(); ?>
        </div>
      </div>





<?php get_footer(); ?>
