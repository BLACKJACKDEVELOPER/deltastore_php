<?php 
session_start();

include "../db.php";

$id = $_GET['id'];
$data = db('SELECT * FROM stores WHERE id="'.$id.'";');
$data = $data->Fetch_assoc();

// get content 
$content = file_get_contents('../assets/store/'.$_SESSION['store_id'].'/'.$data['name']);
$content = base64_encode($content);
echo $content;


 ?>