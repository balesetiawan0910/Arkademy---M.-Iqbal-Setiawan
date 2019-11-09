<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Soal 2 Arkademy</title>
</head>
<body>
    <center>
    <form method="POST">
  Username<br>
  <input type="text" name="username">
  <br>
  Password<br>
  <input type="password" name="passwd">
  <br><br>
  <input type="submit" value="Submit" name="submit">
</form> 

<?php
if (isset($_POST["submit"])) {
  $username = $_POST['username'];
  $passwd = $_POST['passwd'];
  $usernameleng = strlen($username);
  $angkapasswd = substr($passwd, 0,2);
  $simbolpasswd = substr($passwd,2,1);
  $besarpasswd = substr($passwd,3,4);
  

  if($usernameleng < 5 || preg_match("/[A-Z]/",$username) ){
      echo 'Username("'.$username.'")<br>';
      echo "False";
      
  }else{
    echo 'Username("'.$username.'")<br>';
      echo "True";
  }

echo"<br><br>";



  if(preg_match("/[0-9]/",$angkapasswd) && (preg_match("/[@]/",$simbolpasswd) || preg_match("/[&]/",$simbolpasswd)) && preg_match("/^[A-Z .]*$/",$besarpasswd)&& strlen($passwd)==7){
    echo 'Password("'.$passwd.'")<br>';
    echo "True";
    
}else{

    echo 'Password("'.$passwd.'")<br>';
    echo "False";
}
}
?>

    </center>
</body>
</html>