<div class="simplemodal-tinymce-link-display">
	<p class="howto">Enter the destination URL</p>
	<input type="hidden" name="post_id" id="post-id" value="">
	<div>
		<label><span>URL</span><input id="modal-url" type="text" name="href"></label>
	</div>
	<div>
		<label><span>Title</span><input id="modal-title" type="text" name="linktitle"></label>
	</div>
</div>
<?php
//render the rowselect list
$modals->display();

?>
<div class="wp-simplemodal-tinymce-thickbox-footer">
	<input type="hidden" name="editor_id" id="editor_id" value="<?php echo $_GET['editorId']; ?>">
	<div class="wp-simplemodal-update">
		<button type="submit" class="button button-primary">Add Link</button>
	</div>
	<div class="wp-simplemodal-cancel">
		<a href="#">Cancel</a>
	</div>
</div>