<?php
/**
 * Plugin Name:       Disable auto update email notifications
 * Plugin URI:        https://github.com/atanasantonov/dauen
 * Description:       Disable email notifications after auto updates of core, plugins and themes.
 * Version:           1.0.0
 * Requires at least: 5.5
 * Requires PHP:      7.2
 * Author:            Atanas Antonov
 * Author URI:        https://unax.org *
 * License:           GPLv3
 * License URI:       https://www.gnu.org/licenses/gpl.html
 *
 * @package     DAUEN
 * @author      Unax
 */

// Disable core update email notifications.
add_filter( 'auto_core_update_send_email', 'dauen_auto_core_update_send_email', 10, 4 );

// Disable plugins update email notifications .
add_filter( 'auto_plugin_update_send_email', 'dauen_auto_update_send_email', 10, 2 );

// Disable themes update email notifications.
add_filter( 'auto_theme_update_send_email', 'dauen_auto_update_send_email', 10, 2 );

/**
 * Disable core update email notifications if result is ok.
 *
 * @param bool   $send        Whether to send the email. Default true.
 * @param string $type        The type of email to send. Can be one of 'success', 'fail', 'critical'.
 * @param object $core_update The update offer that was attempted.
 * @param mixed  $result      The result for the core update. Can be WP_Error.
 *
 * @return bool
 */
function dauen_auto_core_update_send_email( $send, $type, $core_update, $result ) {
	if ( $result instanceof \WP_Error ) {
		return true;
	}

	if ( 'success' !== $type ) {
		return true;
	}

	return false;
}

/**
 * Disable plugin/theme update email notifications.
 *
 * @param bool  $enabled        True if update notifications are enabled, false otherwise.
 * @param array $update_results The results of update tasks.
 *
 * @return bool
 */
function dauen_auto_update_send_email( $enabled, $update_results ) {
	return false;
}
