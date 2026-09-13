<?php
/**
 * Plugin Name: Assignment Support Enquiries
 * Description: A simple enquiry form that emails the site owner without storing visitor details.
 * Version: 1.0.0
 * Requires PHP: 7.4
 * Text Domain: assignment-support
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Register a recipient address editable in WordPress. */
function ase_register_settings() {
	register_setting(
		'ase_settings',
		'ase_recipient_email',
		array(
			'type'              => 'string',
			'sanitize_callback' => 'sanitize_email',
			'default'           => '',
		)
	);
}
add_action( 'admin_init', 'ase_register_settings' );

function ase_settings_page() {
	add_options_page( 'Enquiry form', 'Enquiry form', 'manage_options', 'ase-enquiries', 'ase_render_settings' );
}
add_action( 'admin_menu', 'ase_settings_page' );

function ase_render_settings() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Enquiry form', 'assignment-support' ); ?></h1>
		<p><?php esc_html_e( 'Submissions are emailed to this address. If left blank, the WordPress administration email is used. Configure and test outgoing mail with your hosting provider or an SMTP plugin.', 'assignment-support' ); ?></p>
		<form action="options.php" method="post">
			<?php settings_fields( 'ase_settings' ); ?>
			<table class="form-table"><tr>
				<th scope="row"><label for="ase_recipient_email"><?php esc_html_e( 'Send enquiries to', 'assignment-support' ); ?></label></th>
				<td><input type="email" class="regular-text" id="ase_recipient_email" name="ase_recipient_email" value="<?php echo esc_attr( get_option( 'ase_recipient_email', '' ) ); ?>" placeholder="<?php echo esc_attr( get_option( 'admin_email' ) ); ?>"><p class="description"><?php esc_html_e( 'Use an address you can access. Never enter an SMTP password here.', 'assignment-support' ); ?></p></td>
			</tr></table>
			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}

/** Render the form with [assignment_support_enquiry_form]. */
function ase_render_form() {
	$status = isset( $_GET['enquiry_status'] ) && is_string( $_GET['enquiry_status'] ) ? sanitize_key( wp_unslash( $_GET['enquiry_status'] ) ) : '';
	ob_start();
	if ( 'sent' === $status ) {
		echo '<p class="form-notice" role="status">' . esc_html__( 'Thank you. Your enquiry has been sent.', 'assignment-support' ) . '</p>';
	} elseif ( 'invalid' === $status ) {
		echo '<p class="form-notice form-error" role="alert">' . esc_html__( 'Please check your name, email and message, then try again.', 'assignment-support' ) . '</p>';
	} elseif ( 'failed' === $status ) {
		echo '<p class="form-notice form-error" role="alert">' . esc_html__( 'We could not send your enquiry. Please contact us on WhatsApp instead.', 'assignment-support' ) . '</p>';
	} elseif ( 'slow' === $status ) {
		echo '<p class="form-notice form-error" role="alert">' . esc_html__( 'Please wait a few minutes before sending another enquiry.', 'assignment-support' ) . '</p>';
	}
	?>
	<form class="enquiry-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
		<input type="hidden" name="action" value="ase_submit_enquiry">
		<?php wp_nonce_field( 'ase_submit_enquiry', 'ase_nonce' ); ?>
		<p class="ase-honeypot" aria-hidden="true"><label for="ase_website">Website</label><input id="ase_website" name="website" type="text" tabindex="-1" autocomplete="off"></p>
		<p><label for="ase_name"><?php esc_html_e( 'Your name', 'assignment-support' ); ?> <span aria-hidden="true">*</span></label><input id="ase_name" name="name" type="text" maxlength="100" autocomplete="name" required></p>
		<p><label for="ase_email"><?php esc_html_e( 'Email address', 'assignment-support' ); ?> <span aria-hidden="true">*</span></label><input id="ase_email" name="email" type="email" maxlength="254" autocomplete="email" required></p>
		<p><label for="ase_message"><?php esc_html_e( 'What support do you need?', 'assignment-support' ); ?> <span aria-hidden="true">*</span></label><textarea id="ase_message" name="message" rows="4" maxlength="3000" required></textarea></p>
		<p class="form-privacy"><?php esc_html_e( 'We use these details to respond to your enquiry. Do not include passwords or sensitive personal information.', 'assignment-support' ); ?></p>
		<button class="button" type="submit"><?php esc_html_e( 'Get a Free Support Plan', 'assignment-support' ); ?></button>
	</form>
	<?php
	return ob_get_clean();
}
add_shortcode( 'assignment_support_enquiry_form', 'ase_render_form' );

/** Process requests from visitors and signed-in users. */
function ase_submit_enquiry() {
	$nonce = isset( $_POST['ase_nonce'] ) && is_string( $_POST['ase_nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['ase_nonce'] ) ) : '';
	if ( ! wp_verify_nonce( $nonce, 'ase_submit_enquiry' ) ) {
		ase_redirect( 'invalid' );
	}
	if ( ! empty( $_POST['website'] ) ) {
		ase_redirect( 'sent' );
	}
	$name    = isset( $_POST['name'] ) && is_string( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$email   = isset( $_POST['email'] ) && is_string( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$message = isset( $_POST['message'] ) && is_string( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';
	if ( '' === $name || strlen( $name ) > 300 || ! is_email( $email ) || strlen( $email ) > 254 || '' === $message || strlen( $message ) > 10000 ) {
		ase_redirect( 'invalid' );
	}
	$ip  = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '';
	$key = 'ase_rate_' . hash_hmac( 'sha256', $ip, wp_salt( 'nonce' ) );
	if ( get_transient( $key ) ) {
		ase_redirect( 'slow' );
	}
	$recipient = get_option( 'ase_recipient_email', '' );
	$recipient = is_email( $recipient ) ? $recipient : get_option( 'admin_email' );
	$body      = "New website enquiry\n\nName: {$name}\nEmail: {$email}\n\nSupport requested:\n{$message}\n";
	$sent      = wp_mail( $recipient, 'New Assignment Support enquiry', $body, array( 'Reply-To: ' . $email ) );
	if ( ! $sent ) {
		ase_redirect( 'failed' );
	}
	set_transient( $key, 1, 5 * MINUTE_IN_SECONDS );
	ase_redirect( 'sent' );
}
add_action( 'admin_post_nopriv_ase_submit_enquiry', 'ase_submit_enquiry' );
add_action( 'admin_post_ase_submit_enquiry', 'ase_submit_enquiry' );

function ase_redirect( $status ) {
	wp_safe_redirect( add_query_arg( 'enquiry_status', $status, home_url( '/' ) ) . '#enquiry', 303 );
	exit;
}
