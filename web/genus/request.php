<?php
	
class Request {
	
	public $parg;
	public $verb;
	
	function __construct() {
		$this->verb = $_SERVER['REQUEST_METHOD'];
		$this->parg = explode( '/', $_GET['PATH_INFO'] );
	}
	
	function accommodate() {
		$ctrlname = ucfirst( $this->parg[0] . 'Controller' );
		if (class_exists( $ctrlname )) {
			$ctrl = new $ctrlname;
			$meth = strtolower( $this->verb );
			$resp = $ctrl->$meth( $this );
		} else {
			$resp = tossSimplePage( '404', "page not found" );
		}
		return $resp;
	}
	
}
	
?>