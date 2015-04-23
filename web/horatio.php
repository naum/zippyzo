<?php

require( 'config.php' );

function __autoload( $classname ) {
    $modulename = $_SERVER['DOCUMENT_ROOT'] 
    	. '/genus/' . strtolower( $classname ) 
        . '.php';
    if (file_exists( $modulename )) {
        require( $modulename );
    }
}

function accommodate_request() {
	Logger::quicklog( "inside accommodate_request" );
	$verb = $_SERVER['REQUEST_METHOD'];
	$parg = explode( '/', $_GET['PATH_INFO'] );
	$ctrlname = ucfirst( $parg[0] . 'Controller' );
	Logger::quicklog( "ctrlname=$ctrlname, verb=$verb" );
	Logger::quicklog( "parg=" . print_r( $parg, true ) );
	if (class_exists( $ctrlname )) {
		$ctrl = new $ctrlname;
		$meth = strtolower( $verb );
		$resp = $ctrl->$meth( $parg );
	} else {
		$resp = toss_simple_page( '404', "page not found" );
	}
	return $resp;	
}

function throw_error_page( $em, $h='error' ) {
	echo "<h2>$h</h2>";
	echo "<p>$em</p>";
	exit;
}

function toss_simple_page( $h, $b ) {
	$p = new Moldscape( 'default' );
	$p->set( 'pagetitle', $h );
	$p->set( 'pagebody', $b );
	return $p->generate();
}

?>
