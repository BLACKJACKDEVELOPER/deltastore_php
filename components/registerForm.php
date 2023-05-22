
<!-- css -->
  <link rel="stylesheet" type="text/css" href="assets/css/register.css">

<div class="boxRegister">

<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // get data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // check if empty
    if (empty($fname) || empty($lname) || empty($email) || empty($password)) { ?>

<div class="ui negative message register">
  <div class="header">
    We're sorry we can't apply that discount
  </div>
  <p>That offer has expired
</p></div>

    <?php }else{ 

  // save into database -> users require
  //(firstname,lastname,email,password)

  $folder = rand();
  db('INSERT INTO users(firstname,lastname,email,password,store) VALUES 
    ("'.$fname.'","'.$lname.'","'.$email.'","'.$password.'","'.$folder.'");');
   mkdir(__dir__.'/../assets/store/'.$folder,0700);
     ?>


<div class="ui success message transition">
  <div class="header">
    Your user registration was successful.
  </div>
  <p>You may now log-in with the username you have chosen</p>
</div>

<?php

  }
}

 ?>

<!--  -->
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="ui form register">
  <div align="center">
    <h1>สมัครสมาชิก</h1>
  </div>
  <div class="field">
    <label>First Name</label>
    <input type="text" name="fname" placeholder="First Name">
  </div>
  <div class="field">
    <label>Last Name</label>
    <input type="text" name="lname" placeholder="Last Name">
  </div>
  <div class="field">
    <label>Email</label>
    <input type="text" name="email" placeholder="Email">
  </div>
  <div class="field">
    <label>Password</label>
    <input type="text" name="password" placeholder="Password">
  </div>
  <button class="ui black button" type="submit">Submit</button>
  <a href="/deltastore/login.php" class="ui gray button" type="submit">Login</a>
</form>

</div>