/* js file for signup/ login page */

// initialize wow.js for animation
new WOW().init();

$(document).ready(function() {
	// login functions and events
	$('#login').on('submit', function(e){
		e.preventDefault();
		$('#loginBtn')
			.attr('disabled', true)
				.html('<i class="fas fa-spinner fa-pulse fa-fw "></i> Processing');
		var formData = new FormData(this);
		$.ajax({
			url: 'src/process.php',
			type : 'POST',
            data : formData,
            processData: false,
            cache: false,
            contentType: false,
            success: function(data){
            	$('#loginBtn')
            		.attr('disabled', false)
            			.html('<i class="fas fa-user-plus"></i> Register');
            	if (data) {
            		alert('Jesus');
            	}
            	else{
            		$('.alert').removeClass('d-none');
            		alert('Saviour');
            	}
            }
		});
	});
	// check for password march
	$('#regInputPassword, #confirmPassword').on('keyup', function(){
		if ($('#regInputPassword').val() !== $('#confirmPassword').val()) {
			$('#confirmPassword')[0].setCustomValidity('Passwords must match.');
		}
		else{
			$('#confirmPassword')[0].setCustomValidity('');
		}
	});
	// Registeration functions and events
	$('#register').on('submit', function(e){
		e.preventDefault();
		$('#regBtn')
			.attr('disabled', true)
				.html('<i class="fas fa-spinner fa-pulse fa-fw "></i> Processing');
		var formData = new FormData(this);
		$.ajax({
			url: 'src/process.php',
			type : 'POST',
            data : formData,
            processData: false,
            cache: false,
            contentType: false,
            success: function(data){
            	$('#regBtn')
            		.attr('disabled', false)
            			.html('<i class="fas fa-user-plus"></i> Register');
            	if (data) {
            		alert('Jesus');
            	}
            	else{
            		$('.alert').removeClass('d-none');
            		alert('Saviour');
            	}
            }
		});
	});
});
