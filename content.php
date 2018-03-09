<?php
/**
 * @package shopline2018
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('col--full'); ?>>
    <div class="card--article"><a class="card__img" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('masonry-image'); ?></a>
    <div class="card__caption">
        <div class="caption__tagdate">
			<?php shopline2018_posted_on(); ?>
        </div>
        <div class="caption">
	    	<a href="<?php the_permalink(); ?>"> 
			<?php the_title(  ); ?>
	        </a>        	
        </div>
    </div>
    </div>
</div>

