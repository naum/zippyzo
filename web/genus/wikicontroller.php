<?php
	
class WikiController extends FallbackController {

	function get( $req ) {
		$pagename = $req->parg[1];
		$epn = DM::esc( $pagename );
		$wikirec = DM::getRow( "SELECT * FROM pages WHERE title = $epn" );
		$page = toss_simple_page( $wikirec['title'], $wikirec['body'] );
		return $page;
	}
	
}

?>