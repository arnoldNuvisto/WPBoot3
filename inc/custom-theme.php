<?php
/**
 * Customize the "Read More" link to use a Bootstrap button
 */
function modify_read_more_link() {

	return '<p><a class="more-link btn btn-default" href="' . get_permalink() . '">Read More</a></p>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );