<?php

function relative_post_date($the_date, $d = '', $before = '', $after = '', $display_ago_only = false) {
	global $post, $previous_day;
	$the_date = strip_tags($the_date);
	if(gmdate('Y', current_time('timestamp')) != mysql2date('Y', $post->post_date, false) && !empty($the_date)) {
		return $before.$the_date.$after;
	}
	$day_diff = (gmdate('z', current_time('timestamp')) - mysql2date('z', $post->post_date, false));
	if($day_diff < 0) { $day_diff = 32; }
	if ($the_date != $previous_day) {
		if($day_diff == 0) {
			return $before.__('Today', 'wp-relativedate').$after;
		} elseif($day_diff == 1) {
			return $before. __('Yesterday', 'wp-relativedate').$after;
		} elseif ($day_diff < 7) {
			if($display_ago_only) {
				return $before.sprintf(_n('%s day ago', '%s days ago', $day_diff, 'wp-relativedate'), number_format_i18n($day_diff)).$after;
			} else {
				return $before.$the_date.' ('.sprintf(_n('%s day ago', '%s days ago', $day_diff, 'wp-relativedate'), number_format_i18n($day_diff)).')'.$after;
			}
		} elseif ($day_diff < 31) {
			if($display_ago_only) {
				return $before.sprintf(_n('%s week ago', '%s weeks ago', ceil($day_diff/7), 'wp-relativedate'), number_format_i18n(ceil($day_diff/7))).$after;
			} else {
				return $before.$the_date.' ('.sprintf(_n('%s week ago', '%s weeks ago', ceil($day_diff/7), 'wp-relativedate'), number_format_i18n(ceil($day_diff/7))).')'.$after;
			}
		} else {
			return $before.$the_date.$after;
		}
		$previous_day = $the_date;
	}
}


### Alternative To WordPress the_date().
function relative_post_the_date($d = '', $before = '', $after = '', $display_ago_only = false, $display = true) {
	global $post;
	if (empty($d)) {
		$the_date = mysql2date(get_option('date_format'), $post->post_date);
	} else {
		$the_date = mysql2date($d, $post->post_date);
	}
	$output = '';
	if(gmdate('Y', current_time('timestamp')) != mysql2date('Y', $post->post_date, false)) {
		$output = $before.$the_date.$after;
	} else {
		$day_diff = (gmdate('z', current_time('timestamp')) - mysql2date('z', $post->post_date, false));
		if($day_diff < 0) { $day_diff = 32; }
		if($day_diff == 0) {
			$output = $before.__('Today', 'wp-relativedate').$after;
		} elseif($day_diff == 1) {
			$output = $before. __('Yesterday', 'wp-relativedate').$after;
		} elseif ($day_diff < 7) {
			if($display_ago_only) {
				$output = $before.sprintf(_n('%s day ago', '%s days ago', $day_diff, 'wp-relativedate'), number_format_i18n($day_diff)).$after;
			} else {
				$output = $before.$the_date.' ('.sprintf(_n('%s day ago', '%s days ago', $day_diff, 'wp-relativedate'), number_format_i18n($day_diff)).')'.$after;
			}
		} elseif ($day_diff < 31) {
			if($display_ago_only) {
				$output = $before.sprintf(_n('%s week ago', '%s weeks ago', ceil($day_diff/7), 'wp-relativedate'), number_format_i18n(ceil($day_diff/7))).$after;
			} else {
				$output = $before.$the_date.' ('.sprintf(_n('%s week ago', '%s weeks ago', ceil($day_diff/7), 'wp-relativedate'), number_format_i18n(ceil($day_diff/7))).')'.$after;
			}
		} else {
			$output = $before.$the_date.$after;
		}
	}
	if($display) {
		echo $output;
	} else {
		return $output;
	}
}

	?>