<?php

require( 'horatio.php' );

$p = new Moldscape( 'holamundo' );
$p->set( 'title', 'tinywiki' );
echo $p->generate();


