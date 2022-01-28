<?php
include_once '../includes/_header.php'; 
include_once '../includes/_sidebar.php';
include_once '../class-master/config.php'; 

//echo ini_set('display_errors', 1);

?>
    <style type="text/css">
        .error{
            color: red;
        }
    </style>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Add Blog</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Blog</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                       <form class="mt-4" enctype="multipart/form-data" id="submit_form">

                            <div class="row pt-3">
                                <div class="col-md-6">
                                    
                        <div class="form-group">
                    <label class="control-label">Category</label>
                    <select class="form-control" name="p_cat" id="p_cat" title="Please select something in category!">
                                    <option value="">Select Category</option>


                            <?php
                                $sql_cat = "SELECT * FROM `categories` WHERE status = 0 order by `id` DESC";
                                
                                    $result_cat = $con->query( $sql_cat);
                                   while($row_cat = $result_cat->fetch_assoc())
                                    {
                                        // echo "<pre>";
                                        // print_r($row_cat);
                                        // echo "</pre>";
                                    
                                 ?>
                                 <option value="<?php echo $row_cat['cat_id'] ?>" onkeychange> <?php echo $row_cat['cat_name']; ?> </option>
                             <?php } ?>

                    </select>
                                    </div>

                                </div>
                                
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Post Sub Category</label>
                                
                                    <select class="form-control" id="sub_cat" name="sub_cat" title="Please select something in parent category!">
                                        <option value="">Select Category</option>
                                </select>

                            </div>
                            </div>
                            
                        </div>
                                <div class="row pt-3">
                                <div class="col-md-6">
                            <div class="form-group">
                            <label class="control-label">Post Title</label>
                                     <input type="text" class="form-control" name="p_title"
                                     id="p_title">   
                                    </div>
                                </div>
                                
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Post Description</label>
                                <textarea type="text" name="p_desc" class="form-control" id="p_desc"></textarea>
                            </div>
                        </div>
                            
                        </div>


                            <div class="row pt-3">
                               
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Post Content</label>
                                <textarea type="text" name="p_content" class="form-control" id="p_content"></textarea>
                            </div>
                        </div>
                                                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Post File Upload</label>
                                 <input type="file" class="form-control" name="uploadfile" id="uploadfile">
                            </div>
                        </div>

                        </div>
                        
                  
                <input type="submit" value="Add" id="add_author" name="add_author" class="btn btn-success">   

                    <a href="view_authors.php" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>  
                </div>
            </div>
        </div>
        <!-- End PAge Content -->
    </div>
</div>
<?php include_once '../includes/_footer.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="http://codeseven.github.io/toastr/build/toastr.min.js"></script>


<script language="javascript" type="text/javascript">
    $(document).ready(function() {

$("#submit_form").submit(function(event) {
  event.preventDefault();
});

$("#submit_form").validate({

rules:{
    p_cat:"required",
    sub_cat:"required",
    p_title:{ 
            required: true,
          },
    p_desc:{
              required:true,
             },
    p_content:{
        required:true,
       // email:true
    },
    uploadfile: {
      required: true,
      extension: "jpg|png|jpeg"
    }
},
      message:{
    p_cat:"Please enter first name",
    p_sub_cat:"Please enter your position",

        p_title:{
        required:"Please enter password name",
       // minlength:"password must be 5 char long",
    },
        p_desc:{
        required:"Please enter password name",
        //minlength:"password must be 5 char long",
    },
},

    submitHandler:function(form){
    $.ajax ({
            url: 'edit_blog.php',
            type: 'post',
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data){
                var result = data;
                alert(result);
                if(result=='done'){

                toastr.success('Author Added', 'Successfully');
                toastr.options.closeHtml = '<button><i class="icon-off"></i></button>';
                toastr.options.showMethod = 'slideUp';
                toastr.options.closeMethod = 'fadeOut';
                toastr.options.closeDuration = 600;
                //toastr.options.timeOut = 30; // How long the toast will display without user interaction
                toastr.options.closeEasing = 'swing';
                $("#submit_form").trigger("reset"); 

                }
                else
                {
                toastr.error('OOPS', 'Something Issue');
                toastr.options.closeHtml = '<button><i class="icon-off"></i></button>';
                toastr.options.showMethod = 'slideUp';
                toastr.options.closeMethod = 'fadeOut';
                toastr.options.closeDuration = 600;
                //toastr.options.timeOut = 30; // How long the toast will display without user interaction
                toastr.options.closeEasing = 'swing';
                $("#submit_form").trigger("reset"); 
                }

        }
    });
    }
});


    
     $("#p_cat").change(function()
 {
  var id = $(this).val();
  $.ajax
  ({
   type:"post",
   url:"get_subcat.php",
   data:{cat_id: id},
   cache:false,
   success:function(data)
   {
    $("#sub_cat").html(data);
    //alert(data);
    console.log(data);
   } 
   });
   });


// doc close
});
</script>
