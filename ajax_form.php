<!DOCTYPE html>
<html>
<head>

    <title></title>
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
</style>
</head>
<body>

 <form>
        <table>
            <tbody>
                <tr>
                    <td>
                        <input type="text" name="first" placeholder="First Name" id="first">
                        <div id="show-error">*The username must be filled.</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="last" placeholder="Last Name" id="last">
                        <div id="show_error">*The Password must be filled.</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Signup" id="signup">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>

<div id="message"></div>
    <script src="assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
<script>    


// function submit() {
//     $("form").submit(function(e) {
//         e.preventDefault();
//         $.ajax({
//             type: 'POST',
//             url: 'process.php',
//             data: $('form').serialize(),
//             success: function() {
//                 console.log("Signup was successful");
//             },
//             error: function() {
//                 console.log("Signup was unsuccessful");
//             }
//         });
//     });
// }

    //submit();

$(document).ready(function() {
$("#signup").click(function(e) {

    var first = $('#first').val();
    var last = $('#last').val();
    //alert(password);
    
    if(first == ""){
      //$('#show-error').html('**The username must be filled.');
      $('#show-error').css('display','block');
      return false;
    }
    else
    {
      $('#show-error').css('display','none');
     // return true;
    }
      if(last == ""){
      $('#show_error').css('display','block');
      return false;
    }
    else
    {
        $('#show_error').css('display','none');
    }





    e.preventDefault();
    alert('click');
    $.ajax({
  type: 'POST',
  url: 'process.php',
  data: $('form').serialize(),
  success: function(data) {

    console.log(data);
  
  }

});


});
});


$('#submit_form').submit(function(event){
  event.preventDefault();

  $.ajax ({
    url: 'process.php',
    type: 'post',
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    success: function(php_script_response){
            alert(php_script_response); 
        }
  })
})



</script>

</body>
</html>
