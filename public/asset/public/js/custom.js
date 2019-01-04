// Popup for login model.
function LoginModel(){
	var email = $('#login_email').val();
    var password = $('#login_password').val();
    var validate = true;

    if (email.length < 1) {
      $('#email-err').text('This field is required');
      validate = false;
    } else {
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      var validEmail = regex.test(email);
      if (!validEmail) {
        $('#email-err').text('Enter a valid email');
        validate = false;
      }
    }
    if (password.length < 4) {
      $('#password-err').text('Password must be at least 4 characters long');
      validate = false;
    }
    if (validate) {
    	$('#password-err').text('');
    	$('#email-err').text('');

    	$.ajax({
	        type: "POST",
	        url:  base_url+'/login',
	        data: {email:email,password:password},
	        success: function (response)
	        {
	        	console.log(response.error);
	           	if (response.error == "true") {
	           		$('#login-err').text('Incorrect email or password');
	           	}else{
	           		var imgId = $('#image_id').val();
	           		ImageLike(imgId)
	           		$('#login_email').val('');
	           		$('#login_password').val('');
	           		$('#myModal').modal('hide');
	           		location.reload();
	           	}
	        },
    	});
    }
}

// Get image data on click heart button.
function ImageSelect(obj){
	var imageId = $(obj).attr('data-id');
	$("#myModal #image_id").val( imageId );
}


// Image like, unlike data ajax call.
function ImageLike(img_id){
	// alert(img_id);
	if (img_id.length > 0) {
		$.ajax({
	        type: "GET",
	        url:  base_url+'/image-count',
	        data: {img_id:img_id},
	        success: function (response)
	        {
	        	console.log(response);
	           	if (response.error == "false") {
	           		$("#image-count-"+img_id).text(response.count);
	           		$("#image-style-"+img_id).css("color",response.colour);
	           	}
	        },
    	});
	}
}     

// Close Login Model.
function loginModelClose(){
	$('#rgtr_name').val('');
	$('#rgtr_email').val('');
	$('#login_password').val('');
	$('#login_email').val('');
	$('#login_password').val('');
}