<?php 
session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>DELTA STORE</title>
 	<link rel="stylesheet" type="text/css" href="assets/css/index.css">
 </head>
 <body>
 	<?php
 	include "db.php";
 	include 'components/header.php';
 	include 'components/navigator.php';
 	 ?>
 
<div class="content" align="center">
<?php
if (!empty($_GET['folder'])) { 
	$folder = $_GET['folder'];
	$path = db('SELECT * FROM folders WHERE id="'.$folder.'" AND fo_owner="'.$_SESSION['store_id'].'";')->fetch_assoc();
	$abspath = $_SESSION['store_id'].'/'.$path['fo_name'];
	$data = db('SELECT * FROM stores WHERE user_id='.$_SESSION['id'].' AND path="'.$abspath.'";');
}else{ 
	$data = db('SELECT * FROM stores WHERE path='.$_SESSION['store_id'].' LIMIT 24;');
}



foreach ($data as $key) { ?>
	
	<div class="item">
		<img src="assets/store/<?php echo $key['path'] ?>/<?php echo $key['name'] ?>">
		<div>
			<p><?php echo $key['name'] ?></p>
			<div class="options">
				<button onclick="public.download('<?php echo $key['id']; ?>')" class="ui button primary">
					<i class="icon download"></i>
					Download
				</button>
				<button onclick="public.delete('<?php echo $key['id']; ?>')" class="ui button red">
					<i class="icon trash"></i>
					Delete
				</button>
			</div>
		</div>
	</div>

<?php }

 ?>
</div>


 </body>
 </html>