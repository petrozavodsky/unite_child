<?php

add_shortcode( 'list_moves', function ( $attrs ) {
	$attrs = shortcode_atts(
		[
			'posts_per_page' => 5
		], $attrs
	);

	$args = [
		"post_type"      => 'movie',
		'posts_per_page' => intval( $attrs['posts_per_page'] )
	];

	$posts = get_posts( $args );
	$res   = '';
	if ( 0 < count( $posts ) ) {
		$res .= "<ol class='row'>";
		foreach ( $posts as $post ) {
			$link = get_the_permalink( $post );
			$res  .= "<li class='col-sm-3'>";
			$res  .= "<a href='{$link}'>";
			$res  .= get_the_title( $post );
			$res  .= "</a>";
			$res  .= "</li>";
		}
		$res .= "<ol>";

		wp_reset_postdata();
	}

	return $res;
} );
