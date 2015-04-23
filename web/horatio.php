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
