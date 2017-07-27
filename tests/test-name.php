<?php

//

class Test_Name extends WP_UnitTestCase {
	/**
	 *
	 */
	public function testCreateUnique() {
		$name = "Catfish Menu";

		// This menu should not exist.
		$uniqueName = \BoldGrid\WpMenuHelpers\Name::createUnique( $name );
		$this->assertSame( $name, $uniqueName );

		$menuId = wp_create_nav_menu( $uniqueName );

		// The menu now exists, so the next name should appended with -1.
		$uniqueName = \BoldGrid\WpMenuHelpers\Name::createUnique( $name );
		$this->assertSame( $uniqueName, $name . '-1' );
	}
}

?>