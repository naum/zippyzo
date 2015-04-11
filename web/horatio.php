<?php

require( 'config.php' );

function __autoload( $classname ) {
    $modulename = $_SERVER['DOCUMENT_ROOT'] . '/genus/' . strtolower( $classname ) . '.php';
    if (file_exists( $modulename )) {
        require( $modulename );
    }
}

?>
