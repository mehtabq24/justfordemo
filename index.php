<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="assets/dist/css/pages/login-register-lock.css" rel="stylesheet">
    <link href="assets/dist/css/style.min.css" rel="stylesheet">
    <link href="http://codeseven.github.io/toastr/build/toastr.min.css" rel="stylesheet"/>
<style type="text/css">
    #show-error{
        color: red;
        font-size: 15px;
        letter-spacing: 1px;
        margin: auto;
        display: none;
    }
    #show_error{
       color: red;
        font-size: 15px;
        letter-spacing: 1px;
        margin: auto;
        display: none;
    }
      .error{
       color: red;

        }

</style>
</head>

<body>
    <?php include_once 'includes/pre_loader.php'; ?>
    <section id="wrapper">
        <div class="login-register">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form p-t-20" method="post" autocomplete="off" id="login_form">
                        <div class="form-group">
                            <div class="col-xs-12 text-center">
                                <div class="user-thumb text-center">
                                    <!-- <img alt="thumbnail" class="logo" width="200" src="assets/images/logo_1.png"> -->
                                   <h1>Login</h1>
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" autocomplete="off">
                        </div>
                    
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon3">
                        </div>

                        <div class="form-group text-center">
                            <div class="col-xs-12">
                                <button name="login" class="btn btn-success btn-lg btn-block text-uppercase waves-effect waves-light" id="login_button" type="submit">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/node_modules/popper/popper.min.js"></script>
    <script src="assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="http://codeseven.github.io/toastr/build/toastr.min.js"></script>


    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });

    $(document).ready(function(){

$("#login_form").submit(function(event) {
  event.preventDefault();
});

$("#login_form").validate({

rules:{
  username:"required",
  password:"required",
},
message:{
  username:"Please enter username",
  password:"Please enter password",
},
    submitHandler:function(form){
  //form.submit();
    $.ajax ({
    url: 'auther_user_edit.php',
    type: 'post',
    data: new FormData(form),
    contentType: false,
    cache: false,
    processData: false,
    success: function(data)
    { 
      // let length = data.length;
      // alert(length);
      // alert(data);

                if(data=='done'){
                 //alert("okay"); 
                //toastr.success('Author Added', 'Successfully');
               // toastr.options.closeHtml = '<button><i class="icon-off"></i></button>';
               /// toastr.options.showMethod = 'slideUp';
               // toastr.options.closeMethod = 'fadeOut';
                //toastr.options.closeDuration = 600;
                //toastr.options.timeOut = 30; // How long the toast will display without user interaction
              //  toastr.options.closeEasing = 'swing';


                toastr.success('Login', 'Successfully', {
                timeOut: 1000,
                preventDuplicates: true,
                positionClass: 'toast-top-center',
                // Redirect 
                onHidden: function() {
                    window.location.href = 'main_dashboard.php';
                }
            });


                $("#login_form").trigger("reset"); 



                }
                else
                {
                  //alert("not okay");
                toastr.error('OOPS', 'Something Issue');
               // toastr.options.closeHtml = '<button><i class="icon-off"></i></button>';
               // toastr.options.showMethod = 'slideUp';
                //toastr.options.closeMethod = 'fadeOut';
                toastr.options.closeDuration = 600;
                //toastr.options.timeOut = 30; // How long the toast will display without user interaction
                //toastr.options.closeEasing = 'swing';
                $("#login_form").trigger("reset"); 
                }

    }
  
  });

  }

});
});



















    
  //   $('#login_button').click(function(){
  //     //alert('click');
      
  //   var username = $('#uname').val();
  //   var password = $('#upass').val();
  //   //alert(password);
    
  //   if(username == ""){
  //     //$('#show-error').html('**The username must be filled.');
  //     $('#show-error').css('display','block');
  //     return false;
  //   }
  //   else
  //   {
  //     $('#show-error').css('display','none');
  //    // return true;
  //   }
  //     if(password == ""){
  //     $('#show_error').css('display','block');
  //     return false;
  //   }
  //   else
  //   {
  //       $('#show_error').css('display','none');
  //   }

  //   });
  // });



        
    </script>
</body>

</html>