jQuery(function($)
{
	var ajax_url = $('#doc_path').val() +'/ajax';
	
	//submit form
	$(document).on('click', '#submit-contact-form', function() {
		var $this = $(this),
		label = $(".alert-contact"),
		label_msg = $(".alert-contact .msg"),
		form = $("#submit-contact");
				
		label.attr('class', 'alert alert-contact');
		
		empty = form.find("input.required, textarea.required, select.required").filter(function() {
			return this.value === "";
		});
		if(empty.length) {
			label_msg.text($('#fields-missing').val());
			label.attr('class', 'alert alert-contact alert-danger');
			label.slideDown(200);
			return false;
		}
		
		$this.button('loading');
		
		$.ajax({
		 type: "POST",
		 url : ajax_url,
		 data: 'action=simpleContact&'+$('form#submit-contact').serialize(),
		 dataType: "json"
		 }).done(function(response) {
			 $this.button('reset');
			  if(response.status == 'error') {
				  	label_msg.text(response.message);
					label.attr('class', 'alert alert-contact alert-danger');
					label.slideDown(200);
					setTimeout(function(){label.slideUp(200);}, 2000);
			  }
			  else{
					label_msg.text(response.message);
					label.attr('class', 'alert alert-contact alert-success');
					label.slideDown(200);
			  }
		 });
		
	});
});