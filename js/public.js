(function($){

	var SimpleModal = {

		init: function(){

			this.bindUIFunctions();

		},

		bindUIFunctions: function(){

			var that = this;

			$('body')
				.on('click','.simplemodal-link',function(){
					that.modalOpen($(this).attr('href'), $(this).attr('data-post-id'));
					return false;
				})
				.on('click','.simplemodal-close',function(){
					that.modalClose();
					return false;
				})

		},

		modalOpen: function(url, postId){
			var loadUrl = '/wp-admin/admin-ajax.php?action=&';
			if( postId ){
				loadUrl += 'postId='+postId;
			}else{
				loadUrl += 'url='+url
			}
			$.ajax({
				url: '/wp-admin/admin-ajax.php',
				data:{
					action: 'simple-modal--ajax-post-load',
					postId: postId,
					url: url
				},
				complete: function(jqXHR, textStatus ){
					if( textStatus == 'success' ){
						var data = JSON.parse( jqXHR.responseText );
						$('#simplemodal-window').addClass(data.size);
						$('#simplemodal-window .modal-header').html(data.title);
						$('#simplemodal-window .modal-body').html(data.content);
						$('#simplemodal-overlay, #simplemodal-window').css({'display':'block'});
					}else{
						alert('error!');
					}
				}
			})
			return false;
		},

		modalClose: function(){

			$('#simplemodal-overlay, #simplemodal-window').css({'display':'none'});
			$('#simplemodal-window .modal-header').text('');
			$('#simplemodal-window .modal-body').text('');

		}

	}

	$(function(){
		SimpleModal.init();
	});

})(jQuery);