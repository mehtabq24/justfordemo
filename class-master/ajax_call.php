<?php
session_start();

require_once('MysqliDb.php');
$db = new MysqliDb();
require_once('functions.php');


if(isset($_POST['deleteRegUser']))
{
	$db->where('id',$_POST['deleteRegUser']);
	if($db->delete('register'))//successfully deleted
	{
		echo '<div class="alert alert-success"><b>Well done!</b> Successfully deleted.</div>';
	}
}

if(isset($_POST['getsubcat']))
{
	$subcat = getSubcategory( $_POST['getsubcat'] );
	foreach ($subcat as $key => $value) {
		?>
		<option value="<?php echo $value['cat_id'];?>"><?php echo $value['cat_name'];?></option>
		<?php
	}
}

if(isset($_POST['new_registration'])){
	// print_r($_POST);
	$data = $_POST;
	$data['password'] = md5($data['password']);
	unset($data['new_registration']);

	$db->where('email',$data['email']);
	if($db->has('registration'))
	{
		$_SESSION['registeration_msg'] = 'Email Id not available';
		header("location:../../account.php");
	}
	else
	{
		$db->insert ('registration', $data);
		$_SESSION['registeration_msg'] = 'Registeration successful !!';
		header("location:../../account.php");
	}
	
}

if(isset($_POST['updateRegStatus'])){

	$id = $_POST['id'];
	$status = $_POST['updateRegStatus'];
	$db->where('user_id', $id);
	$db->update('registration',compact('status'));
	echo 'User '.$status;
}

if(isset($_POST['login'])){
	  $msg = login();
	  if($msg == 1)
	  {
	  	header('location:../../index.php');
	  }
	  else
	  {
	  	header('location:../../account.php');
	  	$_SESSION['login_msg'] = $msg;
	  }

}

if(isset($_POST['ajx_login']))
{
	echo $msg = login();
}

if(isset($_POST['loginajax'])){

echo $msg = login();	
// header("location:index.php"); 

}

if(isset($_POST['layout']))
{
	$layout = $_POST['layout'];
	$sort_order = $_POST['sort_order'];

	$postdatafinal = compact('sort_order');

	$db->where('id',$layout); 
	echo $db->update('layouts', $postdatafinal);
	exit;
	/*echo "Layouts sort order change ";*/	 
}


if(isset($_POST['forgotpassword']))
{
	$email = $_POST['forgotpassword'];
	$data = $db->where('email',$_POST['forgotpassword'])->get('registration'); 

	if($db->count > 0)
	{		 
		$ran = mt_rand(1,9999);
		$password1 = $data[0]['f_name'].$ran;
		$password = md5($data[0]['f_name'].$ran);
		$updat_data = compact('password');
		$db->where('email',$email);
		$db->update('registration',$updat_data);

		$message = 'Your password :'.$password1;
		$headers1 = "MIME-Version: 1.0\r\n";
		$headers1 .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers1 .= "To:";
		$subject = "odelia.com website Contact";
		$headers1 .= "<$email>";
		$headers1 .= "\r\n";
		$headers1 .= "From: <odelia.com>\r\n";
		$subject ='odelia.com';
		$to = 'amolsgirkar@gmail.com';
		echo 'done';
		$x=mail($to , $subject, $message, $headers1);
		/*if($x)*/
			
	}
	else{
		echo "Email id not belong to any account";
	}
	exit;
}


if(isset($_POST['isUserLogin'])){
	print_r($_POST);
	//echo $data = isUserLogin();
}

if(isset($_POST['mywish'])){

	$res = isUserLogin();
	if($res == 'NO'){

		echo 'Please Login';
	}
	else{
		$id = $_POST['mywish'];
		mywish($id);
		echo "Product added to your wishlist";
	}
	exit;
}

if(isset($_POST['product_id']))
{
	//print_r($_POST);
	$p_id = $_POST['product_id'];
	$sort_order = $_POST['sort_order'];

	$db->where('p_id', $p_id);
	$db->update('product', compact('sort_order'));
	echo $db->count . ' records were updated';
	exit;
}


if(isset($_POST['category']) && isset($_POST['item']) && isset($_POST['available'])){

	$category = $_POST['category'];
	$subcategory = $_POST['subcategory'];
	$item = $_POST['item'];
	$available = $_POST['available'];
	//$db->setTrace (true);
 
	$data = $db->rawQuery("SELECT p . * , c.cat_name, s.cat_name AS subcate
							FROM category c
							LEFT JOIN product p ON c.cat_id = p.category
							LEFT JOIN category s ON c.cat_id = s.p_id
							WHERE p.category =  '$category'
							AND p.subcategory =  '$subcategory'							
							AND p.available =  '$available'
							AND p.item like  '%$item%'
							GROUP BY p.p_id");
	//print_r ($db->trace);
	$count = 1;
	if($db->count > 0)
	{
		foreach ($data as $key => $value) {									
    ?>
		<tr>
			<td><?php echo $count;?></td>
			<td><?php echo $value['item'];?></td>
			<td><?php echo $value['cat_name'].' ( '.$value['category'].' )';?></td>
			<td><?php echo $value['subcate'].' ( '.$value['subcategory'].' )';?></td>
			<td><?php echo $value['description'];?></td>
			<td>
				<input type="number" id="sort_order<?php echo $count ;?>" value="<?php echo $value['sort_order'];?>" min="1"  name="sort_order" style="width: 40%;height: inherit;"/>
				<img src="save.ico" style="margin:5px;" onclick="setProductSortOrder('<?php echo $value['p_id']?>','<?php echo $count ;?>')">
			</td>
			<td>
				<a href="view_product.php?x=edit&id=<?php echo $value['p_id'];?>">Edit</a>&nbsp;|&nbsp;
				<a href="edit_product.php?mode=delete&id=<?php echo $value['p_id'];?>">Delete</a>
			</td> 
		</tr>
		<?php
        	$count++;
        }	
	}
	else{
		echo "<td>Data Not Found</td><td></td><td></td><td></td><td></td><td></td><td></td>";
	}
	
                                        
	exit;
}


if (isset($_POST['item'])) {
	$item = $_POST['item'];
	$category = $_POST['category'];
	$subcategory = $_POST['subcategory'];
	//$db->setTrace (true);
	$cols = Array ("p_id","item");
	$db->where('item', Array("LIKE" => "%$item%"));
	$db->where('category', $category);
	$db->where('subcategory', $subcategory);	
	$data = $db->get("product", null, $cols);
	//print_r ($db->trace);
	if($db->count > 0){
		$count = 0;
		foreach ($data as $key => $value) {
		?>
			<a tabindex="<?php echo $coun?>" onclick='selectItem("<?php echo trim($value['item']) ;?>",event)'><li><?php  echo $value['item']; ?></li></a>
		<?php
		}	
	}
	else{
		echo 'Data Not Found';
	}
	//'<a><li>adsasdasdasdasd</li></a>' category=1144&subcategory=1160&item=AER-9035&available=Y
	exit;
}

?>