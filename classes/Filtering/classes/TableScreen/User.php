<?php

namespace ACP\Filtering\TableScreen;

use ACP\Filtering\TableScreen;
use ACP\Helper\FilterButton;
use ACP\Helper\FilterButtonFactory;

class User extends TableScreen {

	public function __construct( array $models ) {
		parent::__construct( $models );

		add_action( 'restrict_manage_users', array( $this, 'render_markup' ), 1 );

		$filter_button = FilterButtonFactory::create( FilterButton::SCREEN_USERS );
		$filter_button->register();
	}

	/**
	 * Run once for Users
	 */
	public function render_markup() {
		remove_action( 'restrict_manage_users', array( $this, 'render_markup' ) );

		parent::render_markup();
	}

}