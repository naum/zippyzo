<?php

require( 'horatio.php' );

if (strlen( $_GET['PATH_INFO'] ) == 0) {
	$_GET['PATH_INFO'] = HOMEPAGE;
}
$req = new Request();
$resp = $req->accommodate();
echo $resp;

?>
