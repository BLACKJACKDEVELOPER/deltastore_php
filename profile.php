<?php 
$getpath = $_SERVER["REQUEST_URI"];
$split_slash = explode("/",$getpath);

for ($i = 3; $i < sizeof($split_slash); $i++) { 

	echo $split_slash[$i];

}
 ?>