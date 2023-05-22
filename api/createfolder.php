<?php 
session_start();
include "../db.php";

$NAME = $_GET['name'];

db('INSERT INTO folders(fo_name,fo_owner) VALUES 
	("'.$NAME.'","'.$_SESSION['store_id'].'")');
mkdir(__dir__.'/../assets/store/'.$_SESSION['store_id'].'/'.$NAME,0700);

echo true;


 ?>