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
                <h4 class="text-themecolor">Add Author</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Author</li>
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
                            <label class="control-label">Name</label>
                                     <input type="text" class="form-control" name="name"
                                     placeholder="Enter Author Name" id="name">   
                                    </div>
                                </div>
                                
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Position</label>
                                <input type="text" class="form-control" name="position" id="position" required="" placeholder="Enter Position Name">
                            </div>
                            </div>
                            
                        </div>
                                <div class="row pt-3">
                                <div class="col-md-6">
                            <div class="form-group">
                            <label class="control-label">Email</label>
                                     <input type="text" class="form-control" name="email"
                                     placeholder="Enter Author Email" id="email">   
                                    </div>
                                </div>
                                
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required="" placeholder="Enter Password">
                            </div>
                            </div>
                            
                        </div>


                            <div class="row pt-3">
                                <div class="col-md-6">
                                    
                            <div class="form-group">
                            <label class="control-label">Category</label>
                    <select class="form-control" name="category" id="category" title="Please select something in category!">
                                    <option value="">Select Category</option>
                                    <option value="office-encharge">Office Encharge</option>
                                    <option value="developer">Dveloper</option>
                                    <option value="marketer">Marketer</option>
                                    <option value="finance">Finance</option>
                    </select>
                                    </div>


                                </div>
                                
                        <div class="col-md-6">
                            <div class="form-group">
                            <label class="control-label">Parent Category</label>
                            <select class="form-control" name="parent_cat" id="parent_cat" title="Please select something in parent category!">
                                    <option value=""> Select Category</option>
                                    <option value="office-encharge">Office Encharge</option>
                                    <option value="developer">Dveloper</option>
                                    <option value="marketer">Marketer</option>
                                    <option value="finance">Finance</option>
                                        </select>
                                    </div>
                            </div>
                            
                        </div>
                            <div class="row pt-3">
                            <div class="col-md-6">    
                           <label for="exampleInputEmail1">Category Name</label>
                                <input type="text" class="form-control" name="cat_name" id="cat_name" placeholder="Enter Category Name">
                            </div>
                            
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Message</label>
                                <textarea type="text" name="message" placeholder="Enter Product Description" class="form-control" id="message"></textarea>
                            </div>
                                </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">File Upload</label>
                                 <input type="file" class="form-control" name="uploadfile" id="uploadfile">
                            </div>

</div>
</div>
<!--                             <input type="hidden" name="mode" value="add" /> -->

                  
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
    name:"required",
    position:"required",
    email:{ 
            required: true,
            email:true,
          },
    password:{
              required:true,
              minlength:5,
              maxlength:10,
             },
    category:{
        required:true,
       // email:true
    },
    parent_cat:{
        required:true,
        //minlength:5
    },
    cat_name:"required",
    message: "required",
    uploadfile: {
      required: true,
      extension: "jpg|png|jpeg"
    }
    },
    message:{
    name:"Please enter first name",
    position:"Please enter your position",

        cat_name:{
        required:"Please enter password name",
       // minlength:"password must be 5 char long",
    },
        message:{
        required:"Please enter password name",
        //minlength:"password must be 5 char long",
    },
},
    submitHandler:function(form){
    $.ajax ({
            url: 'add_author.php',
            type: 'post',
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data){
                var result = data;
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
// doc close
});
</script>
