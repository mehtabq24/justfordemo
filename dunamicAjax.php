<?php 

	include( 'class-master/MysqliDb.php');  
	$db = new MysqliDb();

	if(isset($_POST['change'])) {

		$id = $_POST['id'];
		$table = $_POST['table'];
		$column1 = $_POST['column1'];
		$column2 = $_POST['column2'];
		$val = $_POST['val'];
		
		$data = Array ($column1 => $val );
		$db->where ($column2, $id);
		if ($db->update ($table, $data))
		    echo $db->count . ' records were updated';
		else
		    echo 'update failed: ' . $db->getLastError();
	}
?>