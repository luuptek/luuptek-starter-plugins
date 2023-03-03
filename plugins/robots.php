<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter(
	'robots_txt',
	function ( $output ) {

		$output .= <<<EOD
#                    U
#                 UU UU
#              UU    UUU
# UU          UU      UUU
# UU          UU
# UU          UU
# UU         UUU
# UU         UUU
#  UU UU UU UU

EOD;

		return $output;
	},
	999
);
