<?php

require( 'horatio.php' );

if (strlen( $_GET['PATH_INFO'] ) == 0) {
	$_GET['PATH_INFO'] = HOMEPAGE;
}
$resp = accommodate_request();
echo $resp;

?>
