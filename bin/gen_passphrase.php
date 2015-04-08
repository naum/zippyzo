<?php

require( '../web/horatio.php' );

if (count( $argv ) < 2) {
    exit( "Usage: {$argv[0]} [PASSWORD]\n" );
}

$password = $argv[1];
$passhash = md5( $password . PASSPHRASE );
echo $passhash . "\n";

?>
