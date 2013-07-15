<?php
/**
 * Trim functions: with link, without link
 *
 *
 */
function llama_trim_and_link($string, $delimiter= ' ', $endtoken = '...', $link ='', $linktext='', $limit = 200) {
	// shorten string
	$original_length = strlen($string);
	$string = substr($string, 0, $limit);
	//find last space character
	if($delimiter) {
		$max_char_pos = strrpos($string, $delimiter);
		// shorten to last space and add delimiter
		if($max_char_pos > 0) {
			$string = substr($string, 0, $max_char_pos);
			if($original_length != strlen($string)) {
				$string .= $endtoken;
			}
			$string .= ' <a class="more" href="'.$link.'"/>'.$linktext.'</a>';
		}
	}
	return $string;
}

function llama_trim_text($string, $delimiter= ' ', $endtoken = '...', $link = '', $linktext = '', $limit = 200) {
	// shorten string
	$original_length = strlen($string);
	$string = substr($string, 0, $limit);
	//find last space character
	if($delimiter) {
		$max_char_pos = strrpos($string, $delimiter);
		// shorten to last space and add delimiter
		if($max_char_pos > 0 && $linktext != '') {
			$string = substr($string, 0, $max_char_pos+1);
			$string .= ' <a href="'.$link.'"/>'.$linktext.'</a>';
		}
	}
	else if($original_length != strlen($string)) {
			$string .= ' '.$endtoken;
		}
	return $string;
}

?>
