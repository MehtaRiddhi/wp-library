<?php
class wpl_admin_class {
	/**
	 * Initializes WordPress hooks
	 *
	 * Author: Riddhi Mehta
	 * Since: 1.0.0
	 */
	function __construct() {
		add_action( 'admin_menu', array( $this, 'wpl_admin_form' ) );
	}	


	public function wpl_admin_form(){
		
	}
}