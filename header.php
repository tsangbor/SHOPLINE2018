<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package shopline2018
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if ( get_theme_mod('site_favicon') ) : ?>
	<link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('site_favicon')); ?>" />
<?php endif; ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-spy="scroll" data-target="#scrollspy" data-offset="500">

    <div class="site-container"><!-- #site-container -->
        <div class="nav-primary">
        <div class="wrap"></div>
        </div>
        <header class="site-header">
            <div class="wrap">
                <div class="title-area">
                    <div class="site-title"></div>
                    <div class="site-description"></div>
                </div>
              <div class="header-widget-area">
                <div class="drawer--mask"></div>
                <div class="drawer--wrapper">
                    <div class="menu">
                        <div class="hamburger hamburger--boring" js-toggle="drawer"><span class="hamburger-box"><span class="hamburger-inner"></span></span></div>
                    </div>
                    <nav>
                        <?php 
                        wp_nav_menu( array(
                          'theme_location'  => 'mobile-header-menu',
                          'depth'       => 2, // 1 = with dropdowns, 0 = no dropdowns.
                          'container'     => 'div',
                          'container_class' => '',
                          'container_id'    => 'bs-example-navbar-collapse-1',
                          'menu_class'    => 'navbar-nav mr-auto',
                          'fallback_cb'   => 'WP_Bootstrap_Navwalker::fallback',
                          'walker'      => new WP_Bootstrap_Navwalker()
                        ) );

                        ?>
                        <div class="row--button"><a class="button--drawer" href="https://admin.shoplineapp.com/users/sign_in" target="_blank"><span>登入網店</span></a><a class="button--drawer is-invert" href="https://admin.shoplineapp.com/users/sign_up?utm_source=nav-menu&utm_medium=blog" target="_blank"><span>立即開店</span></a></div>
                    </nav>
                    <div class="row--free__wrapper">
                    <div class="row--free">
                      <ul class="nav nav-list nav--free">
                        <li class="nav-item"><a class="nav-link" href="//shopline.tw/?utm_source=top-menu&utm_medium=blog" target="_blank">免費試用</a></li>
                        <li class="nav-item"><a class="nav-link" href="https://seminar.shopline.tw/?utm_source=top-menu&utm_medium=blog" target="_blank">免費講座</a></li>
                        <li class="nav-item"><a class="nav-link" href="https://consultation.shopline.tw/?utm_source=top-menu&utm_medium=blog" target="_blank">免費諮詢</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="header--customize">
                    <div class="header--left">
                        <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"></a>
                        <a class="header__title" href="<?php echo esc_url( home_url( '/' ) ); ?>">電商教室</a>
                    </div>
                    <div class="header--middle">
                    <nav>
                        <ul class="nav nav-list nav--privmacy">
                          <li class="nav-item"><a class="nav-link" href="//shopline.tw/features/overview/?utm_source=nav-menu&utm_medium=blog" target="_blank">功能特色</a></li>
                          <li class="nav-item"><a class="nav-link" href="//shopline.tw/about/pricing/?utm_source=nav-menu&utm_medium=blog" target="_blank">平台收費</a></li>
                          <li class="nav-item"><a class="nav-link" href="//shopline.tw/showcase/?utm_source=nav-menu&utm_medium=blog" target="_blank">客戶案例</a></li>
                          <li class="nav-item"><a class="nav-link" href="http://seminar.shopline.tw/?utm_source=nav-menu&utm_medium=blog" target="_blank">開店說明會</a></li>
                          <li class="nav-item"><a class="nav-link" href="http://consultation.shopline.tw/?utm_source=nav-menu&utm_medium=blog" target="_blank">開店諮詢</a></li>
                          <li class="nav-item"><a class="nav-link" href="https://shopline.tw/blog/">電商教室</a></li>
                          <li class="nav-item"><a class="nav-link" href="#more">更多資源<i class="fa fa-caret-down"></i></a>
                            <div class="subMenu">
                              <div class="subMenu--container">
                                <nav>
                                  <ul class="nav nav-list nav--secordary">
                                    <li class="nav-item"><a class="nav-link" href="//shopline.tw/online-store-setup/?utm_source=nav-menu&utm_medium=blog" target="_blank">開店密技</a></li>
                                    <li class="nav-item"><a class="nav-link" href="//shopline.tw/templates/?utm_source=nav-menu&utm_medium=blog" target="_blank">版型主題</a></li>
                                    <li class="nav-item"><a class="nav-link" href="//shopline.tw/faq/overview" target="_blank">新手問答</a></li>
                                    <li class="nav-item"><a class="nav-link" href="https://partners.shopline.tw/google-ads-plan/?utm_source=nav-menu&utm_medium=blog" target="_blank">廣告計畫</a></li>
                                  </ul>
                                </nav>
                              </div>
                            </div>
                          </li>
                        </ul>
                    </nav>
                    </div>
                    <div class="header--right button--group">
                        <a class="button--small is-invert" href="http://admin.shoplineapp.com/users/sign_in" target="_blank">登入網店</a><a class="button--small" href="https://admin.shoplineapp.com/users/sign_up?utm_source=nav-menu&utm_medium=blog" target="_blank">立即開店</a></div>
                    <div class="header--right button--cta">
                        <ul class="nav nav-list nav--cta">
                            <li class="nav-item"><a href="//shopline.tw/?utm_source=top-menu&utm_medium=blog" class="nav-link" target="_blank">免費試用開店</a></li>
                            <li class="nav-item"><a href="https://seminar.shopline.tw/?utm_source=top-menu&utm_medium=blog" class="nav-link" target="_blank">免費開店講座</a></li>
                            <li class="nav-item"><a href="https://consultation.shopline.tw/?utm_source=top-menu&utm_medium=blog" class="nav-link" target="_blank">免費專人諮詢</a></li>
                        </ul>
                    </div><a class="button--search" js-toggle="search"></a>
                    <div class="menu">
                        <div class="btn-toggle-menu">
                            <div class="hamburger hamburger--boring" js-toggle="drawer"><span class="hamburger-box"><span class="hamburger-inner"></span></span></div>
                        </div>
                    </div>
                </div>
                <div class="header--search">
                  <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <input placeholder="請在此輸入關鍵字" name="s"></form><a class="button--search"></a><a class="button--closeSearch"><i class="fa fa-angle-right"></i></a>

                </div>
                <div class="header--push"></div>
                <section class="section--hero">
                    <div class="container">
                        <div class="hero__caption">
                            <h1><a href="<?php echo home_url('/'); ?>"><span class="en">SHOPLINE </span>電商教室</a></h1>
                        </div>
                    </div>
                </section>
                <div class="hr--wave"></div>
                <div class="vue-point"></div>
                <div id="sticky">
                    <section class="section--blogNav">
                    <div class="container">
                        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                    </div>
                    </section>
                </div>
                <?php  if( is_home() || is_front_page() ): ?>
                <section class="section--articleSwiper">
                  <div class="container">
                    <?php if ( is_active_sidebar( 'swiper-home' ) ) : ?> 
                    <?php dynamic_sidebar('swiper-home'); ?>
                    <?php endif; ?> 
                  </div>
                </section>
                <?php endif; ?>
                <div class="hr--shadow"></div>
              </div>
            </div>
        </header>
        <nav class="nav-secondary">
            <div class="wrap">
            <ul class="menu">
                <li class="menu-item"></li>
            </ul>
            </div>
        </nav>        
