<?php 

include('class-master/config.php');

 // include('./class-master/MysqliDb.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

   </head>
    <body>



    

      <nav>
 <div class="nav nav-tabs" id="nav-tab" role="tablist">

         <?php

                                $sql_team = "SELECT * FROM `categories` WHERE status=8 order by `id` desc";
                                
                                    $result_team = $con->query( $sql_team);
                                   while($row_team = $result_team->fetch_assoc())
                                  {
                                 ?>
    <a class="nav-item nav-link"  data-toggle="tab" href="#<?php echo $row_team['id']; ?>" role="tab" aria-controls="<?php echo $row_team['id']; ?>" aria-selected="true" id="<?php echo $row_team['id']; ?>"><?php echo $row_team['cat_name']; ?></a>
    <?php } ?>
  
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">

     <?php

      $sql_team = "SELECT * FROM `categories` WHERE status=8 order by `id` desc";
                                
          $result_team = $con->query( $sql_team);
                                   while($row_team = $result_team->fetch_assoc())
                                  {
                                 ?>
  <div class="tab-pane fade show " id="<?php echo $row_team['id']; ?>" role="tabpanel" aria-labelledby="<?php echo $row_team['id']; ?>"><?php echo $row_team['cat_name']; ?></div>
    <?php } ?>


</div>

        <script>
    function resetPassword() {
      alert('gsdfd');
       
        $.ajax({
               type: "POST",
               url: "setEdit_image.php",
               dataType: 'html',
               data: {
                img_id : $('input[name="image-main"]:checked').val()
                }, 
               success: function(data){
                   alert(data);
                   $('#result_123').html(data)
                   
                }
    
           });
    
           return false;
}
</script>
    




<script language="javascript" type="text/javascript">
$(function () {
    $("#fileupload").change(function () {
        if (typeof (FileReader) != "undefined") {
            var dvPreview = $("#dvPreview");
            dvPreview.html("");
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
            $($(this)[0].files).each(function () {
                var file = $(this);
                if (regex.test(file[0].name.toLowerCase())) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var img = $("<img />");
                        img.addClass('ui-state-default');
                        img.attr("style", "height:100px;width: 100px ;margin-right:10px; margin-top:10px; margin-bottom:10px;");
                        img.attr("src", e.target.result);
                        dvPreview.append(img);
                    }
                    reader.readAsDataURL(file[0]);
                } else {
                    alert(file[0].name + " is not a valid image file.");
                    dvPreview.html("");
                    return false;
                }
            });
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    });
});
</script>
    </body>
</html>
