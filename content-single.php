<?php
/**
 * @package shopline2018
 */
?>



<div class="home-top">
</div>
<div class="home-middle">
  <section class="section--article" >
    <div class="container" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="article--cover"><?php the_post_thumbnail(); ?></div>
      <div class="article--head">
        <div class="section__title">
        	<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
          <div>

            <?php shopline2018_posted_on(); ?>
            
          </div>
        </div>
      </div>
      <div class="article--body">
        <article>
          <?php
          if ( has_post_thumbnail() ) :
            the_post_thumbnail();
          endif;
          ?>          
        	<?php the_content(); ?>
        </article>
      </div>
      <div class="article--footer">
      	<?php shopline2018_entry_footer(); ?>
        <?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
        ?>      	
      	<!--
        <div class="box--article">
          <div class="box__title">
            <h4>發表迴響</h4>
          </div>
          <div class="box__content">
            <form class="form">
              <div class="form--input">
                <label>名稱</label><span>
                  <input></span>
              </div>
              <div class="form--input">
                <label>電子郵件</label><span>
                  <input></span>
              </div>
              <div class="form--input">
                <label>公司網址</label><span>
                  <input></span>
              </div>
              <div class="form--textarea"><span>
                  <textarea placeholder="有什麼想法想跟我們討論嗎？快寫下來吧！"></textarea></span></div>
              <div class="form--button">
                <button class="button--basic">送出迴響</button>
              </div>
            </form>
          </div>
        </div>-->
      </div>
    </div>
  </section>
</div>
<div class="home-bottom"></div>

