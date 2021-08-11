<?php
session_start();
if(!empty($_POST['who']) && !empty($_POST['pass'])){
  $oldguess=$_POST['who'];
  $pw=$_POST['pass'];
  $salt='XyZzy12*_';
  $stored_hash='1a52e17fa899cf40fb04cfc42e6352f1';
  $md=hash('md5',$salt.$pw);
  if($md==$stored_hash){
    $_SESSION['account']=$_POST['who'];
     header("Location:game.php?name=".urlencode($_POST['who']));
   }
  else {
    $_SESSION['error']="INCORRECT PASSWORD";
  }
}
else if(empty($_POST['who']) && !empty($_POST['pass'])) {
  $_SESSION['message']="User name and password are required";
} else if(empty($_POST['pass']) && !empty($_POST['who'])){
  $_SESSION['message']="User name and password are required";
}
 ?>

<html>
<head>
  <title> Shubham Vats </title>
</head>
<body>
<h1> Please log in </h1>
  <p>
    <?php
    if(isset($_SESSION['message'])){
      echo($_SESSION['message']);
      unset($_SESSION['message']);
    }
    if(isset($_SESSION['error'])) {
       echo($_SESSION['error']);
       unset($_SESSION['error']);
     }
    ?>
  </p>
  <form method="post">
  <p> Username <input type="text" name="who" value="" size="40"/> </p>
  <p> Password <input type="text" name="pass" value="" size="40"/> </p>
  <p> <input type="submit"  value="Log In"/> </p>
</form>
</body>
</html>
