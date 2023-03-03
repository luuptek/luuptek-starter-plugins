<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action(
	'admin_notices',
	function () {
		if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
			return;
		}

		?>
		<div class="notice notice-warning is-dismissible">
			<p><?php echo apply_filters( 'luuptek_no_acf_warning_message', 'Näyttäisi siltä, että sinulla ei ole Advances Custom Fields Pro-lisäosaa aktivoituna. Jos käytät Luuptek-teemaa, kyseinen lisäosa pitää olla asennettuna ja aktivoitu.' ); ?></p>
		</div>
		<?php
	}
);
