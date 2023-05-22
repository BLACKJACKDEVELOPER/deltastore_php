<?php 
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	include "../db.php";
	$base64 = $_POST['data'];
	$content = base64_decode($base64);
	$name = $_POST['name'];
	
	if (!empty($_GET['folder'])) {
		$folder = db('SELECT * FROM folders WHERE id="'.$_GET['folder'].'";')->fetch_assoc();

		file_put_contents('../assets/store/'.$_SESSION['store_id'].'/'.$folder['fo_name'].'/'.$name, $content);
		//save into database -> stores require
		// (path,name)
		$path = $_SESSION['store_id'].'/'.$folder['fo_name'];
		db('INSERT INTO stores(path,name,user_id,type) VALUES
			("'.$path.'","'.$name.'","'.$_SESSION['id'].'","image");');
		echo "true";

	}else{
		file_put_contents('../assets/store/'.$_SESSION['store_id'].'/'.$name, $content);


		//save into database -> stores require
		// (path,name)
		db('INSERT INTO stores(path,name,user_id,type) VALUES
			("'.$_SESSION['store_id'].'","'.$name.'","'.$_SESSION['id'].'","image");');

		echo "true";
	}



}

 ?>