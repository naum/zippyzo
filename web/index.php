<?php

require( 'horatio.php' );

Logger::quicklog( "inside the belly" );

$p = new Moldscape( 'holamundo' );
$p->set( 'title', 'zippyzo' );
echo $p->generate();

?>
