<?php
/**
 * WP HELO
 *
 * @package   wp-helo
 * @link      https://github.com/lumpysimon/wp-helo
 * @author    Simon Blackbourn <simon@lumpylemon.co.uk>
 * @copyright 2020 Simon Blackbourn
 * @license   GPL v2 or later
 *
 * Plugin Name:  WP HELO
 * Description:  Send emails from your WordPress website to the HELO email debugging and testing app
 * Version:      1.0
 * Plugin URI:   https://github.com/lumpysimon/wp-helo
 * Author:       Simon Blackbourn
 * Author URI:   https://twitter.com/lumpysimon
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * See the GNU General Public License for more details.
 */



defined( 'ABSPATH' ) or die();



$wp_helo = new WP_HELO();



class WP_HELO {



	public function __construct() {

		$this->actions();

	}



	public function actions() {

		add_action( 'phpmailer_init', [ $this, 'configure_phpmailer' ] );

	}



	public function configure_phpmailer( $phpmailer ) {

		$mailbox_name = get_bloginfo( 'name' );

		$phpmailer->isSMTP();

		$phpmailer->Host     = '127.0.0.1';
		$phpmailer->Password = '';
		$phpmailer->Port     = 2525;
		$phpmailer->SMTPAuth = true;
		$phpmailer->Username = $mailbox_name;

	}



} // class WP_HELO
