<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package shopline2018
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside class="sidebar">
	<?php if( is_active_sidebar('sidebar-1') ): ?>
	    <?php dynamic_sidebar('sidebar-1'); ?>
	<?php endif; ?>
    <div class="box--sidebar">
      <div class="box__content">
        <ul class="tab--sellection nav nav-tabs">
          <li class="nav-item"><a class="nav-link active" data-toggle="tab" data-target="#tab-hot">熱門文章</a></li>
          <li class="nav-item"><a class="nav-link" data-toggle="tab" data-target="#tab-recommend">編輯推薦</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="tab-hot">
            <ul class="list--sellection">
				<?php query_posts(array('posts_per_page' => 5,'caller_get_posts' =>1,'orderby' =>'comment_count'));
				while ( have_posts() ) : the_post(); ?>
              <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
              <?php endwhile;wp_reset_query();?>
            </ul>
          </div>
          <div class="tab-pane fade" id="tab-recommend">
            <ul class="list--sellection">
				<?php query_posts(array('posts_per_page' => 5, 'tag' => 'recommend', 'caller_get_posts' =>1,'orderby' => 'date', 'order' => 'DESC'));
				while ( have_posts() ) : the_post(); ?>
              <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
              <?php endwhile;wp_reset_query();?>
            </ul>
          </div>
        </div>
      </div>
    </div>
	<div class="box--sidebar">
	  <div class="box__title">
	    <h3>追蹤 SHOPLINE</h3>
	  </div>
	  <div class="box__content">
	    <div id="fb-root"></div>
	    <script>(function(d, s, id) {
	    	var js, fjs = d.getElementsByTagName(s)[0];
	    	if (d.getElementById(id)) return;
	    	js = d.createElement(s); js.id = id;
	    	js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v2.5&appId=183018925104207";
	    	fjs.parentNode.insertBefore(js, fjs);
	    }(document, 'script', 'facebook-jssdk'));</script>

	    <div class="fb-page" data-href="<?php echo esc_url( get_theme_mod( 'shopline2018_fb' )); ?>" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?php echo esc_url( get_theme_mod( 'shopline2018_fb' )); ?>" class="fb-xfbml-parse-ignore"><a href="<?php echo esc_url( get_theme_mod( 'shopline2018_fb' )); ?>">SHOPLINE</a></blockquote></div>
	  </div>
	</div>
</aside>