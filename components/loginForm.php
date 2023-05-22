
<!-- css -->
  <link rel="stylesheet" type="text/css" href="assets/css/register.css">

<div class="boxRegister">

<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // get data
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // check if empty
    if (empty($email) || empty($password)) { ?>

<div class="ui negative message register">
  <div class="header">
    We're sorry we can't apply that discount
  </div>
  <p>That offer has expired
</p></div>

    <?php }else{ 

  // save into database -> users require
  //(firstname,lastname,email,password)

  $person = db('SELECT * FROM users WHERE email="'.$email.'" AND password="'.$password.'" ;');

  // check query has data

   if ($person->num_rows  == 1) {
       $person = $person->fetch_assoc();
       $_SESSION['fname'] = $person['firstname'];
       $_SESSION['lname'] = $person['lastname'];
       $_SESSION['id'] = $person['id'];
       $_SESSION['store_id'] = $person['store'];
       $_SESSION['profile'] = $person['profile'];

       // redirect to index page
       header('location: index.php');
   }else{ ?>

<div class="ui negative message register">
  <div class="header">
    We're sorry we not found your account
  </div>
  <p>please make sure email or password correctly
</p></div>

 <?php  }
  }
}

 ?>

<!--  -->
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="ui form register">
  <div align="center">
    <h1>เข้าสู่ระบบ</h1>
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
  <a href="register.php" class="ui gray button" type="submit">register</a>
</form>

</div>