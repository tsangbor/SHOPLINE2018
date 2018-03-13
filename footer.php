<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package shopline2018
 */
?>
    <div class="footer-widgets">
        <div class="wrap"></div>
    </div>
    <footer class="site-footer">
        <div class="wrap">
            <div class="hr--shadow"></div>
            <section class="section--promotion">
                <div class="global--bg"></div>
                <div class="container">
                    <div class="promotion__caption">
                    <h4>全亞洲超過 100,000 個品牌<br>都在使用 SHOPLINE</h4>
                    <p>讓更多人看見你的品牌，<br class="show-in-mobile">愛上你的商店，購買你的產品</p>
                    </div>
                    <div class="row--button"><a class="button--xl is-cta" href="register.html"><span>免費試用30天</span></a></div>
                </div>
            </section>
        <div class="footer--customize">
        <div class="container">
        <div class="row--footer">
                <div class="col">
                  <h4>SHOPLINE</h4>
                  <ul class="nav nav--sitemap">
                    <li class="nav-item"><a class="nav-link" href="//shopline.tw/about">關於我們</a></li>
                    <li class="nav-item"><a class="nav-link" href="//shopline.tw/about/team">認識團隊</a></li>
                    <li class="nav-item"><a class="nav-link" href="//shopline.tw/careers">人才招募</a></li>
                    <li class="nav-item"><a class="nav-link" href="//shopline.tw/contact">合作機會</a></li>
                    <li class="nav-item"><a class="nav-link" href="//shopline.tw/partners">認證夥伴</a></li>
                    <li class="nav-item"><a class="nav-link" href="//shopline.tw/about/press">媒體報導</a></li>
                  </ul>
                </div>
                <div class="col">
                  <h4>我要開店</h4>
                  <ul class="nav nav--sitemap">
                    <li class="nav-item"><a class="nav-link" href="//shopline.tw/features/overview">功能特色</a></li>
                    <li class="nav-item"><a class="nav-link" href="//shopline.tw/about/pricing">平台收費</a></li>
                    <li class="nav-item"><a class="nav-link" href="//shopline.tw/showcase">客戶案例</a></li>
                    <li class="nav-item"><a class="nav-link" href="http://seminar.shopline.tw" target="_blank">開店說明會</a></li>
                    <li class="nav-item"><a class="nav-link" href="http://consultation.shopline.tw" target="_blank">開店諮詢</a></li>
                  </ul>
                </div>
                <div class="col">
                  <h4>更多資源</h4>
                  <ul class="nav nav--sitemap">
                    <li class="nav-item"><a class="nav-link" href="https://shopline.tw/blog/" target="_blank">電商教室</a></li>
                    <li class="nav-item"><a class="nav-link" href="//shopline.tw/online-store-setup">開店密技</a></li>
                    <li class="nav-item"><a class="nav-link" href="//shopline.tw/templates">版型主題</a></li>
                    <li class="nav-item"><a class="nav-link" href="//shopline.tw/faq/overview">新手問答</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://partners.shopline.tw/google-ads-plan" target="_blank">廣告計畫</a></li>
                  </ul>
                </div>
        <div class="col"></div>
        <div class="siteinfo">
            <?php if( get_theme_mod( 'active_social' ) == '') : ?>
            <div class="button-group">
                <?php if ( get_theme_mod( 'shopline2018_fb' ) ) : ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'shopline2018_fb' )); ?>" target="_blank"><div class="icon-facebook"></div></a>
                <?php endif; ?>
                <?php if ( get_theme_mod( 'shopline2018_instagram' ) ) : ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'shopline2018_instagram' )); ?>" target="_blank"><div class="icon-instagram"></div></a>
                <?php endif; ?>
                <?php if ( get_theme_mod( 'shopline2018_linked' ) ) : ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'shopline2018_linked' )); ?>" target="_blank"><div class="icon-linkedin"></div></a>
                <?php endif; ?>
                <?php if ( get_theme_mod( 'shopline2018_mail' ) ) : ?>
                    <a href="mailto:<?php echo esc_url( get_theme_mod( 'shopline2018_mail' )); ?>" target="_blank"><div class="icon-mail"></div></a>
                <?php endif; ?>     
            </div>
                <?php else : ?>  
            <?php endif; ?>            
            <div class="copyright">服務時間   星期一至五 上午 10 點至晚上 7 點<br>© Copyright 2013-18 SHOPLINE Limited.</div>
            <div class="row--siteinfo">
                <ul class="nav nav--siteinfo">
                    <li class="nav-item"><a class="nav-link" href="navi.html">網站導覽</a></li>
                    <li class="nav-item"><a class="nav-link" href="">文章轉載說明</a></li>
                    <li class="nav-item"><a class="nav-link" href="">投稿流程說明</a></li>
                </ul>
            </div>
        </div>
        </div>
        <div class="row--footerMobile">
        <ul class="nav nav--footer">
          <li class="nav-item"><a class="shopline btn--collapse collapsed" data-toggle="collapse" href="#shopline"><span>SHOPLINE</span><i class="fa fa-angle-down"></i><i class="plus"></i></a>
            <div class="collapse" id="shopline">
              <ul class="nav nav-list">
                <li class="nav-item"><a class="nav-link" href="//shopline.tw/about">關於我們</a></li>
                <li class="nav-item"><a class="nav-link" href="//shopline.tw/about/team">認識團隊</a></li>
                <li class="nav-item"><a class="nav-link" href="//shopline.tw/careers">人才招募</a></li>
                <li class="nav-item"><a class="nav-link" href="//shopline.tw/contact">合作機會</a></li>
                <li class="nav-item"><a class="nav-link" href="//shopline.tw/partners">認證夥伴</a></li>
                <li class="nav-item"><a class="nav-link" href="//shopline.tw/about/press">媒體報導</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item"><a class="open btn--collapse collapsed" data-toggle="collapse" href="#open"><span>我要開店</span><i class="fa fa-angle-down"></i><i class="plus"></i></a>
            <div class="collapse" id="open">
              <ul class="nav nav-list">
                <li class="nav-item"><a class="nav-link" href="//shopline.tw/features/overview">功能特色</a></li>
                <li class="nav-item"><a class="nav-link" href="//shopline.tw/about/pricing">平台收費</a></li>
                <li class="nav-item"><a class="nav-link" href="//shopline.tw/showcase">客戶案例</a></li>
                <li class="nav-item"><a class="nav-link" href="http://seminar.shopline.tw" target="_blank">開店說明會</a></li>
                <li class="nav-item"><a class="nav-link" href="http://consultation.shopline.tw" target="_blank">開店諮詢</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item"><a class="resources btn--collapse collapsed" data-toggle="collapse" href="#resources"><span>更多資源</span><i class="fa fa-angle-down"></i><i class="plus"></i></a>
            <div class="collapse" id="resources">
              <ul class="nav nav-list">
                <li class="nav-item"><a class="nav-link" href="https://shopline.tw/blog/" target="_blank">電商教室</a></li>
                <li class="nav-item"><a class="nav-link" href="//shopline.tw/online-store-setup">開店密技</a></li>
                <li class="nav-item"><a class="nav-link" href="//shopline.tw/templates">版型主題</a></li>
                <li class="nav-item"><a class="nav-link" href="//shopline.tw/faq/overview">新手問答</a></li>
                <li class="nav-item"><a class="nav-link" href="https://partners.shopline.tw/google-ads-plan" target="_blank">廣告計畫</a></li>
              </ul>
            </div>
          </li>
        </ul>
        <div class="siteinfo">
        <div class="button-group"><a>
        <div class="icon-brand"></div></a><a>
        <div class="icon-facebook"></div></a><a>
        <div class="icon-instagram"></div></a><a>
        <div class="icon-linkedin"></div></a><a>
        <div class="icon-mail"></div></a></div>
        <ul class="nav nav--siteinfo">
        <li class="nav-item"><a class="nav-link">網站導覽</a></li>
        <li class="nav-item"><a class="nav-link">文章轉載說明</a></li>
        <li class="nav-item"><a class="nav-link">投稿流程說明</a></li>
        </ul>
        <div class="copyright">服務時間   星期一至五 上午 10 點至晚上 7 點<br>© Copyright 2013-17 SHOPLINE Limited.</div>
        </div>
        </div>
        <hr>
        <div class="row--copyright">
            <div class="col--left">
                        <?php if ( get_theme_mod( 'shopline2018_footer_copyright' ) ) : ?>
                            <?php echo esc_html( get_theme_mod( 'shopline2018_footer_copyright' )); ?>   
                        <?php endif; ?>
            </div>
            <div class="col--right">
                    <?php if ( get_theme_mod( 'shopline2018_footer_descr' ) ) : ?>
                        <?php echo  get_theme_mod( 'shopline2018_footer_descr' ); ?>   
                    <?php endif; ?>                
            </div>
        </div>
        </div>
        </div>
        </div>
    </footer>

</div><!-- #site-container -->

<?php wp_footer(); ?>

</body>
</html>
