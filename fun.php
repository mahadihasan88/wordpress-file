<?php 


function calling_resource(){
	//calling style
	wp_enqueue_style('style', get_stylesheet_uri() ); 
	
}
add_action('wp_enqueue_scripts','calling_resource');

function our_theme_setup(){
	
	//register nav menu
register_nav_menus(array(
'primary'=>__('Primary Menu'),
'footer'=>__('Footer Menu'),
));
//Featured image
add_theme_support('post-thumbnails');	
}
add_action('after_theme_setup','our_theme_setup');

  

//sidebar Resister
function ourWidgetInit(){
	register_sidebar(array(
	'Name'=>'Primary Sidebar',
	'id'=>'sidebar1',
	'before_widget'=>' <div class="single_sidebar clear">',
	'after_widget'=>'</div>',
	'before_title'=>'<h2 class="sidebar_heading">',
	'after_title'=>'</h2>'
	
	
	
	));
}
add_action('widgets_init' , 'ourWidgetInit');
// Excerpt Function
function excerpt( $num) {
	$limit = $num+1;
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt)." <a href='" .get_permalink($post->ID) ." ' class='".readmore."'>Continue Reading &raquo;</a>";
	echo $excerpt;
}
