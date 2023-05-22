<?php 
session_start();
include "../db.php";

$id = $_GET['id'];
db('DELETE FROM stores WHERE id="'.$id.'" AND user_id="'.$_SESSION['id'].'";');
echo true;

 ?>