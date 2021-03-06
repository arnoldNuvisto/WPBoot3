<?php
/**
 * Customize the "Read More" link to use a Bootstrap button
 */
function modify_read_more_link() {

	return '<p><a class="more-link btn btn-default" href="' . get_permalink() . '">Read More</a></p>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );

/**
 * Customize the "Edit" link to use a Bootstrap button
 */
function custom_edit_post_link($output) {

 $output = str_replace('class="post-edit-link"', 'class="post-edit-link btn btn-danger btn-xs"', $output);
 return $output;
}
add_filter('edit_post_link', 'custom_edit_post_link');