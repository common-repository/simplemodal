<div class="wrap">
	<?php
		//header
		echo $data['header_text'];
	?>
	<div id="poststuff">
		<form action="options.php" method="post">
			<?php

				settings_fields( 'simplemodal-settings-group' );
				do_settings_sections( 'simplemodal-settings-group' );


				//build the group form
			?>
			<div id="namediv" class="stuffbox">
				<h3><label for="name">Modal Sizes</label></h3>
				<div class="inside">
					<table class="form-table">
						<tbody>
							<?php
								foreach( $overall['fields'] as $field ):
									echo $field;
								endforeach;
							?>
						</tbody>
					</table>
					<br>
				</div>
			</div>
			<div class="form-actions">
				<button type="submit" class="button button-large button-primary">Save</button>
			</div>
		</form>
	</div><!-- /#poststuff -->
</div><!-- /.wrap -->
<?php

/* End of file */
/* Location: ./simple-modal/views/settings.php */