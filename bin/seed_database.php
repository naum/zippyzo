<?php

$dbdir = dirname( getcwd() ) . '/db';
$dbfile = $dbdir . '/zippyzo.db';
$sqldir = dirname( getcwd() ) . '/sql';
$sqlfile = $sqldir . '/genesis.sql';

`sqlite3 {$dbfile} <{$sqlfile}`;

echo "It is done.\n";


?>
