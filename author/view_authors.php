<?php
include_once '../includes/_header.php'; 
include_once '../includes/_sidebar.php';
include_once '../class-master/config.php'; 
//include_once '../class-master/MysqliDb.php';
?>
<div class="page-wrapper">
    <div class="container-fluid">

        <!-- Start Page Content -->
        <div class="row">
            <div class="col-12">
                 <div class="card">
                    <div class="card-body" style="display: table-footer-group;">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h5 class="card-title m-b-0">TO DO LIST</h5>
                            </div>
                            <div class="ml-auto">
                                <a href="add_authors.php" class="pull-right btn btn-circle btn-success"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                            <div style="overflow-x: scroll !important;">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Position</th>
                                        <th>Category</th>
                                        <th>New Category</th>
                                        <th>Image</th>
                                        <th>Message</th>
                                        <th>Text</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php
                              $i=1;

                                $sql_team = "SELECT * FROM `author` order by `id` desc";
                                
                                    $result_team = $con->query( $sql_team);
                                   while($row_team = $result_team->fetch_assoc())
                                    {

                                 ?>
                                    <tr>
                                        <td><?php echo $i;?></td>

                                        <td><?php echo $row_team['author_name']; ?></td>
                                        <td><?php echo $row_team['author_email']; ?></td>
                                        <td><?php echo $row_team['author_position']; ?></td>
                                        <td><?php echo $row_team['category']; ?></td>
                                    <td><?php echo $row_team['new_category']; ?></td>
                                    <td><img src="image/<?php echo $row_team['image']; ?>" alt="author image" class="img-responsive" style="width: 100px;"></td>
                                    
                                    <td><?php echo $row_team['message']; ?></td>
                                    <td><?php echo $row_team['author_text']; ?></td>                                        
                                        <td><a class="edit" data-toggle="modal" data-target=".long-modal" onclick="return modaldata('<?php echo $raw['pro_id']; ?>')">
                                            <i class="icon-list-alt"></i></a><a class="edit" href="edit_broker.php?product_id=<?php echo $row_team['id'];?>"><i class="icon-pencil"></i> Edit
                                        </a> | <a class="delete" href="javascript:void(0)" onclick="deleteFunction(<?php echo $row_team['id']; ?>)"><i class="ti-trash"></i>Trash</a>
                                        </td>
                                    </tr>
                                    <?php $i++; } ?> 
                                </tbody>
                            </table>
                            </div>
                
                    </div>
                </div>
            </div>
        </div>
        <!-- End PAge Content -->


    </div>
    <div class="modal long-modal" tabindex="-1" role="dialog" aria-labelledby="longmodal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="longmodal">Large modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" style="padding: 0px 10px 0px 10px; ">
                <div class="table-responsive">
                    <table class="table">

                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



</div>
<?php include_once '../includes/_footer.php'; ?>

<script type="text/javascript">
                               function deleteFunction(id){
                                 var x = confirm("Are you sure you want to delete this?");
                                 
                                 if (x){                
                                          $.ajax({
                                              type: "POST",
                                              url: "ajax_delete_team.php",
                                              dataType:'html',
                                              data: { 
                                                team_id: id
                                              
                                              },
                                              success:function(data) {
                                              //$("#whats_new").html(data);
                                              location.reload();
                                             // alert(data);
                                              }

                                             });  
                                      }
                                }
                               </script>