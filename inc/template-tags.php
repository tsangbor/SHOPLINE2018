<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package shopline2018
 */

/**
 * WordPress 添加面包屑导航
 * https://www.wpdaxue.com/wordpress-add-a-breadcrumb.html
 */
if( ! function_exists('shopline2018_breadcrumbs') ) :


function shopline2018_breadcrumbs() {
	$delimiter = ' > '; // 分隔符
	$before = '<span class="current">'; // 在当前链接前插入
	$after = '</span>'; // 在当前链接后插入
	if ( !is_home() && !is_front_page() || is_paged() ) {
		global $post;
		$homeLink = home_url();
		echo ' <a itemprop="breadcrumb" href="' . $homeLink . '">' . __( 'Home' ) . '</a>  ';
		if ( is_category() ) { // 分类 存档
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category($thisCat);
			$parentCat = get_category($thisCat->parent);
			if ($thisCat->parent != 0){
				$cat_code = get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' ');
				echo $cat_code = str_replace ('<li','<li itemprop="breadcrumb"', $cat_code );
			}
			echo $before . '' . single_cat_title('', false) . '' . $after;
		} elseif ( is_day() ) { // 天 存档
			echo '<a itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>  ';
			echo '<a itemprop="breadcrumb"  href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
			echo $before . get_the_time('d') . $after;
		} elseif ( is_month() ) { // 月 存档
			echo '<a itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>  ';
			echo $before . get_the_time('F') . $after;
		} elseif ( is_year() ) { // 年 存档
			echo $before . get_the_time('Y') . $after;
		} elseif ( is_single() && !is_attachment() ) { // 文章
			if ( get_post_type() != 'post' ) { // 自定义文章类型
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				echo '<a itemprop="breadcrumb" href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
				echo $before . get_the_title() . $after;
			} else { // 文章 post
				$cat = get_the_category(); $cat = $cat[0];
				$cat_code = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				echo $cat_code = str_replace ('<a','<a itemprop="breadcrumb"', $cat_code );
				echo $before . get_the_title() . $after;
			}
		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;
		} elseif ( is_attachment() ) { // 附件
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			echo '<a itemprop="breadcrumb" href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ';
			echo $before . get_the_title() . $after;
		} elseif ( is_page() && !$post->post_parent ) { // 页面
			echo $before . get_the_title() . $after;
		} elseif ( is_page() && $post->post_parent ) { // 父级页面
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a itemprop="breadcrumb" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			foreach ($breadcrumbs as $crumb) echo $crumb . ' ';
			echo $before . get_the_title() . $after;
		} elseif ( is_search() ) { // 搜索结果
			echo $before ;
			printf( __( 'Search Results for: %s'),  get_search_query() );
			echo  $after;
		} elseif ( is_tag() ) { //标签 存档
			echo $before ;
			printf( __( 'Tag Archives: %s'), single_tag_title( '', false ) );
			echo  $after;
		} elseif ( is_author() ) { // 作者存档
			global $author;
			$userdata = get_userdata($author);
			echo $before ;
			printf( __( 'Author Archives: %s'),  $userdata->display_name );
			echo  $after;
		} elseif ( is_404() ) { // 404 页面
			echo $before;
			_e( 'Not Found');
			echo  $after;
		}
		if ( get_query_var('paged') ) { // 分页
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
				echo sprintf( __( '( Page %s )'), get_query_var('paged') );
		}
	}
}

endif;
if ( ! function_exists( 'shopline2018_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function shopline2018_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	$pagination_html = '';
	$total_pages = $GLOBALS['wp_query']->max_num_pages;
	if ($total_pages > 1){
		$current_page = max(1, get_query_var('paged'));
		if ( !get_option('permalink_structure') ) {
		 $format = '&paged=%#%';
		}else{
		 $format = 'page/%#%/';
		}
		$big = 999999999;
		$pagination = paginate_links(array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => $format,
			'current' => $current_page,
			'total' => $total_pages,
			'prev_text' => 'Prev',
			'next_text' => 'Next',
			'type' => 'array'
		));
		if( sizeof($pagination) > 0 ){
			$pagination_html .= '<ul class="page-numbers">';
			foreach( $pagination as $k => $v ){
				$pagination_html .= '<li>'.$v.'</li>';
			}
			if( !is_home() ){
				$pagination_html .= '<li><a href="'.home_url('/').'all/" class="button--pagination__sp">瀏覽全部文章</a></li>';
			}
			$pagination_html .= '</ul>';
		}
		echo $pagination_html;
	}
}
endif;

if ( ! function_exists( 'shopline2018_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function shopline2018_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation'); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous"><span class="valign">%link</span></div>', _x( '<span class="meta-nav">&larr;</span>&nbsp;%title', 'Previous post link') );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link',     'bloggr' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'shopline2018_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function shopline2018_posted_on() {
	$html = '';
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {

		$tag_ary = get_the_tags();
		if( $tag_ary ){
			$html .= '<div class="tags">';
			for($i=0;$i<sizeof($tag_ary);$i++){
				if( $i < 2 ){
					$tag_link = get_tag_link( $tag_ary[$i]->term_id );
					$tag_name = $tag_ary[$i]->name;
					$html .= '<div class="tag"><a href="'.$tag_link.'" rel="tag">'.$tag_name.'</a></div>';
				}
			}
			$html .= '</div>';
		}
	}

	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s" style="display:none;">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$html .= '<div class="date">'.$time_string.'</div>';
	echo $html;

}
endif;


if ( ! function_exists( 'shopline2018_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function shopline2018_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;


if ( ! function_exists( 'shopline2018_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function shopline2018_entry_footer() {
	// Hide category and tag text for pages.


    $html = '';
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( '</div><div class="tag">' );
		if ( $categories_list && shopline2018_categorized_blog() ) {
			$html .= '<div class="box--article"><div class="box__title"><h4>文章分類</h4></div><div class="box__content"><div class="tags"><div class="tag">';
			$html .= $categories_list ;
			$html .= '</div></div></div></div>';
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '<div class="tag">', '</div><div class="tag">','</div>' );
		if ( $tags_list ) {
			$html .= '<div class="box--article"><div class="box__title"><h4>標籤</h4></div><div class="box__content"><div class="tags">';
			$html .= $tags_list;
			$html .= '</div></div></div>';
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		$html .= '<span class="comments-link"><i class="fa fa-comments-o"></i> ';
		comments_popup_link( __( 'Leave a comment'), __( '1 Comment'), __( '% Comments') );
		$html .= '</span>';
	}
	echo $html;
}
endif;

if ( ! function_exists( 'the_archive_title' ) ) :
/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function the_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( __( 'Category: %s'), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( __( 'Tag: %s'), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( __( 'Author: %s'), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( __( 'Year: %s'), get_the_date( _x( 'Y', 'yearly archives date format') ) );
	} elseif ( is_month() ) {
		$title = sprintf( __( 'Month: %s'), get_the_date( _x( 'F Y', 'monthly archives date format') ) );
	} elseif ( is_day() ) {
		$title = sprintf( __( 'Day: %s'), get_the_date( _x( 'F j, Y', 'daily archives date format') ) );
	} elseif ( is_tax( 'post_format', 'post-format-aside' ) ) {
		$title = _x( 'Asides', 'post format archive title');
	} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
		$title = _x( 'Galleries', 'post format archive title');
	} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
		$title = _x( 'Images', 'post format archive title');
	} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
		$title = _x( 'Videos', 'post format archive title');
	} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
		$title = _x( 'Quotes', 'post format archive title');
	} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
		$title = _x( 'Links', 'post format archive title');
	} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
		$title = _x( 'Statuses', 'post format archive title');
	} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
		$title = _x( 'Audio', 'post format archive title');
	} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
		$title = _x( 'Chats', 'post format archive title');
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( __( 'Archives: %s'), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( __( '%1$s: %2$s'), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = __( 'Archives');
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function shopline2018_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'shopline2018_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'shopline2018_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so shopline2018_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so shopline2018_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in shopline2018_categorized_blog.
 */
function shopline2018_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'shopline2018_categories' );
}
add_action( 'edit_category', 'shopline2018_category_transient_flusher' );
add_action( 'save_post',     'shopline2018_category_transient_flusher' );

