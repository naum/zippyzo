<?php
	
class FallbackController {
	
	function __call( $name, $arg ) {
		$req = $arg[0];
		tossSimplePage( '404', "unable to {$name} {$req->parg[0]}" );
	}

}

?>