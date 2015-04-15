<?php
	
class WikiController extends FallbackController {

	function get( $req ) {
		$pagename = $req->parg[1];
		$epn = DM::esc( $pagename );
		$wikirec = DM::getRow( "SELECT * FROM pages WHERE title = $epn" );
		$page = tossSimplePage( $wikirec['title'], $wikirec['body'] );
		return $page;
	}
	
}

?>