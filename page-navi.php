<?php
/**
Template Name: Navi Page
 *
 * @package shopline2018
 */

get_header(); ?>

      <div class="site-inner container">
            <section class="section--naviCover">
              <div class="container">
                <div class="section__title">
                  <h1><span>電商教室 </span><br class="v-lg v-xl">網站導覽</h1>
                  <p>從網路行銷到商店營運<br class="v-md v-sm v-xs"><span class="v-lg v-xl">-</span>電商創業者的首選知識庫</p>
                </div>
              </div>
            </section>
            <section class="section--navi">
              <div class="container">
                <div class="row--navi">
                  <div class="col" v-for="menu in menus[&quot;.value&quot;]">
                    <div class="card--navi">
                      <div class="card__img"><img :src="menu[0].imgurl"></div>
                      <div class="card__caption">
                        <h4>{{menu[0].menu}}</h4>
                        <ul class="list--navi" v-if="menu.length != 1">
                          <li v-for="data in menu"><a :href="data.link">{{data.submenu}}</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
      </div>

      <script src="//www.gstatic.com/firebasejs/4.6.0/firebase.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/vue/2.4.2/vue.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/vuefire/1.4.4/vuefire.min.js"></script>
      <script src="//shopline-blog-2018.coreplay.com.tw/assets/js/navi.js"></script>

<?php get_footer(); ?>
