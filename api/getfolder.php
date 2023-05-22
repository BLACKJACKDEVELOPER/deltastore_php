<?php 
session_start();
include "../db.php";

$folders = db("SELECT * FROM folders WHERE fo_owner='".$_SESSION['store_id']."';");

echo "[";
foreach ($folders as $data) {

    echo '{"fo_name":"'.$data['fo_name'].'",'.'"fo_id":"'.$data['id'].'",'.'"fo_owner":"'.$data['fo_owner'].'"},';
}
echo "]";

 ?>