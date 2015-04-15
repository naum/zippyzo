<?php

define( 'DM_LOG', 'dm.log' );

class DM {

    static $dbc = NULL;
    static $qresult = NULL;

    static function connect() {
        $dsn = 'sqlite:' . DBDIR . '/zippyzo.db';
        try {
            self::$dbc = new PDO( $dsn );
        } catch (PDOException $e) {
            die( 'database connection error' );
        }
        self::$dbc->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }

    static function errorOut( $e ) {
        Logger::quicklog( "e: " . print_r( $e, true ), DM_LOG );
        Logger::quicklog( "DB ERROR: " . $e->getMessage() . " CODE: " . $e->getCode(), DM_LOG );
        throwErrorPage( 'database query error' );
    }

    static function esc( $str ) { 
        if (! self::$dbc) { self::connect(); }
        return self::$dbc->quote( $str );
    }

    static function getAll( $sql ) {
        if (! self::$dbc) { self::connect(); }
        $rtab = array();
        try {
            $s = self::$dbc->query( $sql );   
            while ($rr = $s->fetch( PDO::FETCH_BOTH )) {
                $rtab[$rr[0]] = $rr;
            }
        } catch( PDOException $e ) {
            self::errorOut( $e );
        }
        return $rtab;
    }

    static function getList( $sql ) {
        if (! self::$dbc) { self::connect(); }
        $rlist = array();
        try {
            $qr = self::$dbc->query( $sql );
            while ($rr = $qr->fetch()) {
                $rlist[] = $rr[0];
            }
        } catch ( PDOException $e ) {
            self::errorOut( $e );
        }
        return $rlist;
    }

    static function getMatrix( $sql ) {
        if (! self::$dbc) { self::connect(); }
        $rtab = array();
        try {
            $qr = self::$dbc->query( $sql, PDO::FETCH_ASSOC );
            while ($rr = $qr->fetch()) {
                $rtab[] = $rr;
            }
        } catch ( PDOException $e ) {
            self::errorOut( $e );
        }
        return $rtab;
    }

    static function getOne( $sql ) {
        if (! self::$dbc) { self::connect(); }
        try {
            $qr = self::$dbc->query( $sql );
            $rr = $qr->fetch();
        } catch ( PDOException $e ) {
            self::errorOut( $e );
        }
        return $rr[0];
    }

    static function getRow( $sql ) {
        if (! self::$dbc) { self::connect(); }
        $rr = NULL;
        try {
            $qr = self::$dbc->query( $sql );
            $rr = $qr->fetch();
        } catch ( PDOException $e ) {
            self::errorOut( $e );
        }
        return $rr;
    }

    static function insertId() {
        return self::$dbc->lastInsertId(); 
    }

    static function numRows() {
        return self::$qresult->rowCount();
    }

    static function query( $sql ) {
        if (! self::$dbc) { self::connect(); }
        try {
            self::$qresult = self::$dbc->query( $sql );
        } catch ( PDOException $e ) {
            self::errorOut( $e );
        }
    }

    static function result() {
        return self::$qresult->fetch( PDO::FETCH_ASSOC );
    }

}

?>

