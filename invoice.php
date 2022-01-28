<?php
include_once 'includes/header.php'; 
include_once 'includes/sidebar.php';
require 'class-master/MysqliDb.php';
$db = new MysqliDb();
if (isset($_GET['mode']) && $_GET['mode'] == 'invoice') {
    
    if (!empty($_GET['id'])) { 
        $orderId = $_GET['id'];
    }
}
?>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Dashboard</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body printableArea">
                    <h3><b>INVOICE</b> <span class="pull-right">#5669626</span></h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-right text-right">
                                <address>
                                    <?php 
                                    $detail = $db->rawQuery("SELECT c.id As customerId ,CONCAT(c.first_name,' ',c.last_name) AS Fullname, c.*, inv.* FROM invoice_tbl inv INNER JOIN customers c ON c.id = inv.customer_id WHERE inv.order_id = ".$orderId." ");
                                    ?>
                                    <h4 class="font-bold"><?php echo $detail[0]['Fullname']; ?>,</h4>
                                    <p class="text-muted m-l-30"><?php echo $detail[0]['address']; ?>,
                                        <br/> <?php echo $detail[0]['address1']; ?>,
                                        <br/> <?php echo ucfirst($detail[0]['city']); ?> - <?php echo $detail[0]['pincode']; ?>
                                        <br/> <?php echo ucfirst($detail[0]['state']); ?>
                                        <br/> <?php echo ucfirst($detail[0]['country']); ?></p>
                                    <p class="m-t-30"><b>Invoice Date :</b> <?php echo date('d - M - Y', strtotime($detail[0]['created_date'])); ?></p>
                                </address>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive m-t-40" style="clear: both;">
                                <table class="table table-hover">
                                    <thead>
                                        
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Product Name</th>
                                            <th class="text-right">Size</th>
                                            <th class="text-right">Color</th>
                                            <th class="text-right">Quantity</th>
                                            <th class="text-right">Unit Cost</th>
                                            <th class="text-right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $productlist = $db->rawQuery('SELECT * FROM product_tbl p INNER JOIN order_items i ON p.pro_id = i.product_id INNER JOIN orders o ON i.order_id = o.id WHERE o.customer_id = '.$detail[0]['customerId'].' ');
                                        $i = 1; 
                                        if (is_array($productlist)) {
                                            $subTotal = 0;
                                            foreach ($productlist as $key => $list) { 
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $i; ?></td>
                                            <td><?php echo $list['pro_name']; ?></td>
                                            <td class="text-right"><?php echo $list['pro_size']; ?></td>
                                            <td class="text-right"> <?php echo $list['pro_color']; ?> </td>
                                            <td class="text-right"> <?php echo $list['quantity']; ?> </td>
                                            <td class="text-right"> <?php echo $list['unit_price']; ?> </td>
                                            <td class="text-right"> <?php echo $list['unit_price'] * $list['quantity']; ?> </td>
                                        </tr>
                                        <?php 
                                            $subTotal += $list['total_price'];
                                        } $i++;  
                                    } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="pull-right m-t-30 text-right">
                                <p>Sub - Total amount: <?php echo $subTotal; ?></p>
                                <hr>
                                <h3><b>Total :</b> <?php echo $subTotal; ?></h3>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="text-right">
                                <button class="btn btn-danger" type="submit"> Proceed to payment </button>
                                <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Content -->
    </div>
</div>

<?php include_once 'includes/footer.php'; ?>