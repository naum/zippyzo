<?php
	
class FallbackController {
	
	function __call( $name, $arg ) {
		$req = $arg[0];
		toss_simple_page( '404', "unable to {$name} {$req->parg[0]}" );
	}

}

?>