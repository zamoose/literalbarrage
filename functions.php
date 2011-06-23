<?php
register_sidebar(array('name'=>'BigBar'));


function lbc_title(){
		if (is_page()) { $temp_head_title = trim(strtolower(wp_title('', false))); }
		if (is_single()) { $temp_head_title = "blog"; }
		if (is_archive()) { $temp_head_title = "archives"; }
		if (is_404()) { $temp_head_title = "404'd!"; }
		if (is_search()) { $temp_head_title = "search"; }
		$temp_head_title = ":".$temp_head_title;
		if (is_home()) { $temp_head_title = ""; }
	?>
	<h1><span id="blogtitle"><a href="<?php bloginfo('url'); ?>"><?php echo get_bloginfo('name'); ?></a></span><span id="blogselector"><?php echo $temp_head_title; ?></span></h1>
<?php 
}

function lbc_unplug_title(){
	remove_action('lblg_print_title', 'lblg_title');
}

function lbc_sidebar_header(){
	echo "<div id=\"bigbar\">\n";
	echo "<ul>\n";
 	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('BigBar') ) : 

    endif; 
    echo "</ul>\n";
}

function lbc_sidebar_footer(){
	echo "</div>";
}

function lbc_enqueue_styles() {
	
}

add_action('init','lbc_unplug_title');
add_action('lblg_print_title', 'lbc_title');
add_action('lblg_sidebar_header', 'lbc_sidebar_header');
add_action('lblg_sidebar_footer', 'lbc_sidebar_footer');
add_action( 'wp_print_styles', 'lbc_enqueue_styles' );
