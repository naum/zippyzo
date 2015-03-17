<?php

define( 'DEFAULT_LOGFILE', 'activity.log' );

class Logger {

    var $fp, $pid;

    function Logger( $logfile=DEFAULT_LOGFILE ) {
        chdir( LOGDIR );
        $this->fp = fopen( $logfile, 'a' );
        $this->pid = getmypid();
    }

    static function quicklog( $str, $logfile=DEFAULT_LOGFILE ) {
        chdir( LOGDIR );
        $fp = fopen( $logfile, 'a' );
        $ts = date( 'Y-m-d H:i:s' );
        $rip = $_SERVER['REMOTE_ADDR'];
        fputs( $fp, "[$ts $rip] " . $str . "\n" );
        fclose( $fp );
    }

    function close() { fclose( $this->fp ); }

    function logb( $str ) {
        $ts = date( 'Y-m-d H:i:s' );
        $str = preg_replace( '/\n+/', ' ', $str );
        fputs( $this->fp, "[$ts {$this->pid}] " . $str . "\n" );
    }

    function logIt( $str ) {
        $ts = date( 'Y-m-d H:i:s' );
        $rip = $_SERVER['REMOTE_ADDR'];
        fputs( $this->fp, "[$ts $rip] " . $str . "\n" );
    }


    function stamp( $str ) {
        $ts = date( 'Y-m-d H:i:s' );
        $str = preg_replace( '/\n+/', ' ', $str );
        fputs( $this->fp, "[ $ts ] " . $str . "\n" );
    }

}

?>
