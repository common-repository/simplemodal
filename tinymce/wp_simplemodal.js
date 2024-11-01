(function($) {
	tinymce.create('tinymce.plugins.wp_simplemodal', {
		init : function(ed, url) {
			ed.addButton('wp_simplemodal', {
				title : 'Select the Modal for this Link',
				icon : 'nametag',
				onclick : function() {
					var data = {
						action : 'simple-modal--editor-modal-list-lookup',
						editorId : ed.id
					};
					//console.log(ed);
					tb_show('Select the Modal for this Link', ajaxurl+'?'+$.param(data) );
				}
			});
		},
		createControl : function(n, cm) {
	        return null;
		},
		getInfo : function() {
			return {
				longname : "WordPress Simple Modal Plugin",
				author : 'Adam Dehnel',
				authorurl : 'http://arsdehnel.net/',
				infourl : 'http://arsdehnel.net/',
				version : "1.0"
			};
		}
	});
	tinymce.PluginManager.add('wp_simplemodal', tinymce.plugins.wp_simplemodal);

	$('body').on('click','.simplemodal-tinymce-modal-select li',function(){
		$(this).addClass('selected').siblings().removeClass('selected');
		var href = $(this).attr('data-display-value');
		var title = $(this).find('.simplemodal-title').text();
		var postId = $(this).attr('data-value');
		$('.simplemodal-tinymce-link-display #modal-url').val(href);
		$('.simplemodal-tinymce-link-display #post-id').val(postId);
		$('.simplemodal-tinymce-link-display #modal-title').val(title);
	});

	$('body').on('click','.wp-simplemodal-cancel a',function(){
		self.parent.tb_remove();
	})

	$('body').on('click','.wp-simplemodal-update button',function(){
		var href = $('.simplemodal-tinymce-link-display #modal-url').val();
		var title = $('.simplemodal-tinymce-link-display #modal-title').val();
		var postId = $('.simplemodal-tinymce-link-display #post-id').val();
		var selection = tinymce.get($('#editor_id').val()).selection;
		selection.setContent('<a href="'+href+'" data-post-id="'+postId+'" title="'+title+'" class="simplemodal-link">' + selection.getContent() + '</a>');
		self.parent.tb_remove();
	})




})(jQuery);