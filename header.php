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
                        <?php wp_nav_menu( array( 'menu' => 'Mobile Menu' ) ); ?>
                        <div class="row--free">
                          <ul class="nav nav-list nav--free">
                            <li class="nav-item"><a class="nav-link">免費試用開店</a></li>
                            <li class="nav-item"><a class="nav-link">免費開店講座</a></li>
                            <li class="nav-item"><a class="nav-link">免費專人諮詢</a></li>
                          </ul>
                        </div>
                        <div class="row--button"><a class="button--drawer" href="login.html"><span>登入網店</span></a><a class="button--drawer is-invert" href="register.html"><span>立即開店</span></a></div>
                    </nav>
                </div>
                <div class="header--customize">
                    <div class="header--left">
                        <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"></a>
                        <div class="header__title">電商教室</div>
                    </div>
                    <div class="header--middle">
                    <nav>
                        <ul class="nav nav-list nav--privmacy">
                            <li class="nav-item"><a class="nav-link" href="https://shopline.hk/features.html">功能特色</a></li>
                            <li class="nav-item"><a class="nav-link" href="https://shopline.hk/price.html">平台收費</a></li>
                            <li class="nav-item"><a class="nav-link" href="https://shopline.hk/client.html">客戶案例</a></li>
                            <li class="nav-item"><a class="nav-link" href="https://seminar.shopline.hk" target="_blank">開店講座</a></li>
                            <li class="nav-item"><a class="nav-link openSubMenu" href="https://consultation.shopline.hk/" target="_blank">開店諮詢</a></li>
                            <li class="nav-item"><a class="nav-link" href="https://shopline.hk/blog/" target="_blank">電商教室</a></li>
                            <li class="nav-item"><a class="nav-link" href="#more">更多資源<i class="fa fa-caret-down"></i></a>
                              <div class="subMenu">
                                <div class="subMenu--container">
                                  <nav>
                                    <ul class="nav nav-list nav--secordary">
                                      <li class="nav-item"><a class="nav-link" href="https://shopline.hk/tuts.html">開店秘技</a></li>
                                      <li class="nav-item"><a class="nav-link" href="https://shopline.hk/theme.html">版型主題</a></li>
                                      <li class="nav-item"><a class="nav-link" href="https://shopline.hk/faq.html">新手問答</a></li>
                                      <li class="nav-item"><a class="nav-link" href="https://shopline.hk/Google-ads" target="_blank">廣告計劃</a></li>
                                    </ul>
                                  </nav>
                                </div>
                              </div>
                            </li>
                        </ul>
                    </nav>
                    </div>
                    <div class="header--right button--group">
                        <a class="button--small is-invert" href="http://admin.shoplineapp.com/users/sign_in">登入網店</a><a class="button--small" href="http://admin.shoplineapp.com/users/sign_up">立即開店</a></div>
                    <div class="header--right button--cta">
                        <ul class="nav nav-list nav--cta">
                            <li class="nav-item"><a class="nav-link">免費試用開店</a></li>
                            <li class="nav-item"><a class="nav-link">免費開店講座</a></li>
                            <li class="nav-item"><a class="nav-link">免費專人諮詢</a></li>
                        </ul>
                    </div><a class="button--search" js-toggle="search"></a>
                    <div class="menu">
                        <div class="btn-toggle-menu">
                            <div class="hamburger hamburger--boring" js-toggle="drawer"><span class="hamburger-box"><span class="hamburger-inner"></span></span></div>
                        </div>
                    </div>
                </div>
                <div class="header--search">
                    <input placeholder="請在此輸入關鍵字"><a class="button--search"></a><a class="button--closeSearch"><i class="fa fa-angle-right"></i></a>
                </div>
                <div class="header--push"></div>
                <section class="section--hero">
                    <div class="container">
                        <div class="hero__caption">
                            <h1>SHOPLINE 電商教室</h1>
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
