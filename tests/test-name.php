<?php
/**
 * BoldGrid Source Code
 *
 * @copyright BoldGrid.com
 * @version   $Id$
 * @author    BoldGrid.com <wpb@boldgrid.com>
 */

/**
 * Boldgrid\WpMenuHelpers\Name Test class.
 *
 * @since 1.0.0
 */
class Test_Name extends WP_UnitTestCase {

	/**
	 * Setup.
	 *
	 * @since 1.0.0
	 */
	public function setUp() {

	}

	/**
	 * Test Boldgrid\WpMenuHelpers\Name createUnique class.
	 *
	 * @since 1.0
	 */
	public function testCreateUnique() {
		$name = "Catfish Menu";

		// This menu should not exist.
		$uniqueName = \BoldGrid\WpMenuHelpers\Name::createUnique( $name );
		$this->assertSame( $name, $uniqueName );

		$menuId = wp_create_nav_menu( $uniqueName );

		// The menu now exists, so the next name should appended with -2.
		$uniqueName = \BoldGrid\WpMenuHelpers\Name::createUnique( $name );
		$this->assertSame( $uniqueName, $name . '-2' );

		$menuId = wp_create_nav_menu( $uniqueName );

		$uniqueName = \BoldGrid\WpMenuHelpers\Name::createUnique( $name );
		$this->assertSame( $uniqueName, $name . '-3' );

		/*
		 * Make sure -2 through -100 menu names exist. After this limit,
		 * createUnique will return false.
		 */
		for( $x = 4; $x <= 100; $x++ ) {
			wp_create_nav_menu( $name . '-' . $x );
		}
		$uniqueName = \BoldGrid\WpMenuHelpers\Name::createUnique( $name );
		$this->assertSame( $uniqueName, false );
	}
}

?>