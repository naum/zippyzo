<?php

date_default_timezone_set( 'America/Phoenix' );

## AUTHENTICATION

define( 'PASSPHRASE', 'As for prophecies, they will be brought to an end.' );

## DIRECTORIES

define( 'DBDIR', dirname( $_SERVER['DOCUMENT_ROOT'] ) . '/db' );
define( 'LOGDIR', dirname( $_SERVER['DOCUMENT_ROOT'] ) . '/log' );
define( 'TEMPLATEDIR', $_SERVER['DOCUMENT_ROOT'] . '/views' );

## SITE INFO

define( 'HOMEPAGE', 'wiki/Genesis' );
define( 'SITETITLE', 'zippyzo' );
define( 'SITEFOOTER', 'A GNT creation &copy;1963-2015' );

?>
