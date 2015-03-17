<?php

function __autoload( $classname ) {
  $modulename = 'genus/' . strtolower( $classname ) . '.php';
  if (file_exists( $modulename )) {
    require( $modulename );
  }
}
