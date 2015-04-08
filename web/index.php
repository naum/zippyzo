<?php

require( 'horatio.php' );

$p = new Moldscape( 'default' );
$p->set( 'title', 'zippyzo' );
$p->set( 'pagetitle', 'welcome' );
$p->set( 'pagebody', @$_GET['PATH_INFO'] );
echo $p->generate();

?>
