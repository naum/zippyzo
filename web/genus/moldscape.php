<?php

class Moldscape {

  var $bind, $dolayout, $tplate;
    
  static function render( $t, $bind=null, $dolayout=false ) {
    if ($dolayout) {
      $html = file_get_contents( TEMPLATEDIR . '/layout.tpl' );
      $html = str_replace( 
        '<!--YIELD-->', 
        file_get_contents( TEMPLATEDIR . '/' . $t . '.tpl' ), 
        $html 
      );
    } else {
      $html = file_get_contents( TEMPLATEDIR . '/' . $t . '.tpl' );
    }
    $vdir = TEMPLATEDIR . '/';
    $html = preg_replace( 
      '/\{\#(\w+)\#\}/e', 
      'file_get_contents( "$vdir" . "$1.tpl" )', 
      $html 
    );
    $html = preg_replace( '/\{\=(\w+)\=\}/e', 'constant("$1")', $html );
    $html = preg_replace( 
      '/\{\!([A-Za-z0-9_:,\(\)]+)\!\}/e', 
      'lambdamu("$1")', 
      $html 
    );
    if ($bind) {
      foreach ($bind as $b => $v) {
        $rtext = '{{' . $b . '}}';
        $html = str_replace( $rtext, $v, $html );
      }
    }
    return $html;
  }
 
  function __construct( $t="default", $dolayout=true ) {
    $this->tplate = $t;
    $this->dolayout = $dolayout;
    $this->bind = array();
  }

  function append( $b, $c ) { 
    if (! isset( $this->bind[$b] )) { $this->bind[$b] = ''; }
    $this->bind[$b] .= $c; 
  }

  function generate() {
    return self::render( $this->tplate, $this->bind, $this->dolayout );
  }

  function set( $b, $c ) { 
    $this->bind[$b] = $c; 
  }

}

function lambdamu( $fcall ) {
  $farg = array();
  # Strip dynamic function arguments, encased in parenthesis, 
  # though they be optional
  if (preg_match( '/\((.*?)\)/', $fcall, $mat )) {
    $farg = explode( ',', $mat[1] );
    $fcall = preg_replace( '/\(.*?\)/', '', $fcall );
  }
  # Could be object::method invocation
  if (! strstr( $fcall, '::' )) {
    if (count( $farg ) == 0) {
      return call_user_func( $fcall );
    } else {
      return call_user_func_array( $fcall, $farg );
    }
  } else {
    list( $obj, $meth ) = explode( '::', $fcall );
    if (count( $farg ) == 0) {
      return call_user_func( array( $obj, $meth ) );
    } else {
      return call_user_func_array( array( $obj, $meth ), $farg );
    }
  }
}

?>
