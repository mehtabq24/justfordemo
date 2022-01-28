<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.error{
			color: red;

		}
	</style>
	   <link href="http://codeseven.github.io/toastr/build/toastr.min.css" rel="stylesheet"/>
</head>
<body>
 <form id="submit_form" enctype="multipart/form-data">
        <table>
            <tbody>
                <tr>
                    <td>
                        <input type="text" name="first" placeholder="First Name" id="first">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="last" placeholder="Last Name" id="last">
                    </td>
                </tr>
                                <tr>
                    <td>
                        <input type="text" name="email" placeholder="Last Name" id="email">
                    </td>
                </tr>
                <tr>
                    <td><input type="password" name="pass" placeholder="password" id="pass"></td>
                </tr>
                <tr><td><label for="fruit">Please select a fruit</label>
<select id="fruit" name="fruit" title="Please select something!">
  <option value="">Select...</option>
  <option value="1">Banana</option>
  <option value="2">Apple</option>
  <option value="3">Peach</option>
</select></td></tr>
	
		<tr><td><input type="file" class="left" id="field" name="field"></td></tr>

                <tr>
                    <td>
                        <input type="submit" value="Signup" id="signup" name="signup">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>

    <h1>JavaScript Email Validation</h1>
<input name="email" placeholder="Email"/>
<button id="btn" >Validate</button>
<p id="message"></p>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="http://codeseven.github.io/toastr/build/toastr.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

$("#submit_form").submit(function(event) {
  event.preventDefault();
});

$("#submit_form").validate({

rules:{
	first:"required",
	last:"required",
	email:{
		required:true,
		email:true,
        
        normalizer: function( value ) {
        var url = value;

        // Check if it doesn't start with http:// or https:// or ftp://
        if ( url && url.substr(-4) !== ".com"
        ) {
          // then prefix with http://
          url = url + ".com";
        }
 
        // Return the new url
        return url;
      }
	},
	pass:{
		required:true,
		minlength:5
	},
    fruit:{
      required: true
    },
       field: {
      required: true,
      extension: "jpg|png|jpeg"
    }
},
message:{
	first:"Please enter first name",
	last:"Please enter email",
	email:{
		required:"please enter email",
		email:"please enter valid email",
	},
	pass:{
		required:"Please enter password name",
		minlength:"password must be 5 char long",
	},

},
		submitHandler:function(form){
	//form.submit();
			  $.ajax ({
    url: 'process.php',
    type: 'post',
    data: new FormData(form),
    contentType: false,
    cache: false,
    processData: false,
    success: function(php_script_response){
            //alert(php_script_response); 
            
toastr.success('Author Added', 'Successfully');
toastr.options.closeHtml = '<button><i class="icon-off"></i></button>';
toastr.options.showMethod = 'slideUp';
//toastr.options.hideMethod = 'slideUp';
//toastr.options.closeMethod = 'slideUp';

toastr.options.closeMethod = 'fadeOut';
toastr.options.closeDuration = 300;
toastr.options.closeEasing = 'swing';


toastr.options.timeOut = 30; // How long the toast will display without user interaction
//toastr.options.extendedTimeOut = 60; // How long the toast will display after a user hovers over it
// $('#submit_form').reset();
//$("#submit_form").resetForm();
$("#submit_form").trigger("reset");
        }
  });

		}

});


});
</script>
<script type="text/javascript">
    const email = document.querySelector('input[name=email]');
const button = document.querySelector('#btn');
const text =  document.querySelector('#message');

    const validateEmail= (email) => {
    
    var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    return regex.test(String(email).toLowerCase());
}

button.addEventListener('click',()=>{
    if(validateEmail(email.value)){
      text.innerText="Valid email";
    }else{
      text.innerText="Invalid email";
    }
})
</script>

</body>
</html>