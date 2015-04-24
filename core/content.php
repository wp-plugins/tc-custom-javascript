<?php

class TCCJ_Core_Content {
	public static function update() {
		if ( self::has_update_request() ) {
			// Sanitizing data before insert to database
			$tccj_content = wp_check_invalid_utf8( $_POST['tccj-content'], true );
			$tccj_content = htmlentities( $tccj_content );
			$tccj_content = addslashes( $tccj_content );

			update_option( 'tccj_content', $tccj_content );
		}
	}

	private static function has_update_request() {
		if ( isset( $_POST['tccj-update'] ) && ( $_POST['tccj-update'] == 'Update' ) && ( !empty( $_POST['tccj-content'] ) ) )
			return true;
		else
			return false;
	}
}
