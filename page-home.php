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
							<h2 class="catalog--title"><i class="ico--new"></i><a href="<?php echo home_url('/'); ?>all/"><span><?php echo esc_html( get_theme_mod( 'newest_text' )); ?> </span></a></h2>
						</div>
						<div class="row--articleList is-col-2">

						<?php query_posts( array ( 'post_type' => 'post', 'posts_per_page' => 2 ) );
			                $i=1;
			            	while ( have_posts() ) : the_post();
							?>
							<div id="post-<?php the_ID(); ?>" <?php if($i>0){post_class('col');}else{post_class('col--full');} ?> >
							  <div class="card--article">
							  	<a class="card__img" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('global-thumb'); ?></a>
							    <div class="card__caption">
							      <div class="tagsDate">
									<?php shopline2018_posted_on();?>
							      </div>
							      <div class="caption"><a href="<?php the_permalink(); ?>"><?php $content = get_the_title(); $trimmed_content = wp_trim_words( $content, 35, '<a href="'. get_permalink() .'"> ...</a>' ); echo get_the_title(); ?></a>
							      </div>
							      <div class="content">
                    				<?php $content = get_the_content(); $trimmed_content = wp_trim_words( $content, 100, '' ); echo $trimmed_content; ?>...
							      </div>
							    </div>
							  </div>
							</div>

						<?php $i++; endwhile; // end of the loop. ?>
						</div>
					<?php endif; ?>

                  <div class="section__title">
                    <h2 class="catalog--title"><i class="ico--marketingshare"></i><a href="<?php echo esc_url(get_category_link( '211' )); ?>"><span>網店行銷分享</span></a></h2>
                  </div>
                  <div class="row--articleList is-col-4">
						<?php query_posts( array ( 'post_type' => 'post', 'posts_per_page' => 4, 'cat' => 211) );
			                $i=1;
			            	while ( have_posts() ) : the_post();
							?>
							<div id="post-<?php the_ID(); ?>" <?php if($i>0){post_class('col');}else{post_class('col--full');} ?> >
							  <div class="card--article">
							  	<a class="card__img" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('global-thumb'); ?></a>
							    <div class="card__caption">
							      <div class="tagsDate">
									<?php shopline2018_posted_on();?>
							      </div>
							      <div class="caption">
							      	<a href="<?php the_permalink(); ?>"><?php $content = get_the_title(); $trimmed_content = wp_trim_words( $content, 35, '<a href="'. get_permalink() .'"> ...</a>' ); echo get_the_title(); ?></a>
							      </div>
							    </div>
							  </div>
							</div>

						<?php $i++; endwhile; // end of the loop. ?>
                  </div>
                  <div class="section__title">
                    <h2 class="catalog--title"><i class="ico--caseshare"></i><a href="<?php echo esc_url(get_category_link( '5' )); ?>"><span>品牌案例分享</span></a></h2>
                  </div>
                  <div class="row--articleList is-col-4">
						<?php query_posts( array ( 'post_type' => 'post', 'posts_per_page' => 4, 'cat' => 5) );
			                $i=1;
			            	while ( have_posts() ) : the_post();

							?>
							<div id="post-<?php the_ID(); ?>" <?php if($i>0){post_class('col');}else{post_class('col--full');} ?> >
							  <div class="card--article">
							  	<a class="card__img" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('global-thumb'); ?></a>
							    <div class="card__caption">
							      <div class="tagsDate">
									<?php shopline2018_posted_on();?>
							      </div>
							      <div class="caption"><a href="<?php the_permalink(); ?>"><?php $content = get_the_title(); $trimmed_content = wp_trim_words( $content, 35, '<a href="'. get_permalink() .'"> ...</a>' ); echo get_the_title(); ?></a></div>
							    </div>
							  </div>
							</div>

						<?php $i++; endwhile; // end of the loop. ?>
                  </div>
                  <div class="section__title">
                    <h2 class="catalog--title"><i class="ico--shopfeature"></i><a href="<?php echo esc_url(get_category_link( '4' )); ?>"><span>最新電商功能</span></a></h2>
                  </div>
                  <div class="row--articleList is-col-4">
						<?php query_posts( array ( 'post_type' => 'post', 'posts_per_page' => 4, 'cat' => 4) );
			                $i=1;
			            	while ( have_posts() ) : the_post();

							?>
							<div id="post-<?php the_ID(); ?>" <?php if($i>0){post_class('col');}else{post_class('col--full');} ?> >
							  <div class="card--article">
							  	<a class="card__img" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('global-thumb'); ?></a>
							    <div class="card__caption">
							      <div class="tagsDate">
									<?php shopline2018_posted_on();?>
							      </div>
							      <div class="caption"><a href="<?php the_permalink(); ?>"><?php $content = get_the_title(); $trimmed_content = wp_trim_words( $content, 35, '<a href="'. get_permalink() .'"> ...</a>' ); echo get_the_title(); ?></a></div>
							    </div>
							  </div>
							</div>

						<?php $i++; endwhile; // end of the loop. ?>
                  </div>

					<div class="row--button" style="margin-top: -1rem; margin-bottom: 1rem;"><a class="button--readAll" href="<?php echo home_url('/'); ?>all/"><span>瀏覽所有文章</span></a></div>

                </div>
              </section>
            </div>
            <div class="home-bottom"></div>
          </main>

			<?php get_sidebar(); ?>
        </div>
      </div>





<?php get_footer(); ?>
