
<?php

	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'simplemodal-post-save-meta', 'simplemodal_post_save_meta_nonce' );

	// Display the form, using the current value.
	echo '<table class="form-table">';
	$sizes->display('form-table-row');
    echo '</table>';

/* End of file */
/* Location: ./simple-modal/meta-box.php */