<?php
/**
 * BoldGrid WpMenuHelpers Name class.
 *
 * @package Boldgrid\WpMenuHelpers
 *
 * @version 1.0.0
 * @author BoldGrid <wpb@boldgrid.com>
 */

namespace Boldgrid\WpMenuHelpers;

/**
 * Boldgrid WpMenuHelpers Name class.
 *
 * @since 1.0.0
 */
class Name {

	/**
	 * Create a unique menu name.
	 *
	 * If you attempt to create a menu with a menu name that already exists, the
	 * menu will fail to be created. This method will attempt to make a menu
	 * name unique if it is not already unique. The uniqueness is done by
	 * appending -# until we find a unique name, such as menu-name-2.
	 *
	 * @since 1.0.0
	 *
	 * @param  string $name A potential menu name.
	 * @return string A unique menu name.
	 */
	public static function createUnique( $name ) {
		$menuExists = is_nav_menu( $name );

		if ( ! $menuExists ) {
			return $name;
		}

		for ( $x = 2; $x <= 100; $x++ ) {
			$newName = $name . '-' . $x;
			$menuExists = is_nav_menu( $newName );

			if ( ! $menuExists ) {
				return $newName;
			}
		}

		return false;
	}
}