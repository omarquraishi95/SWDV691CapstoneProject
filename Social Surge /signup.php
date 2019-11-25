<?php

$to = "oquraishi1@live.maryville.edu";
$from = $_REQUEST['email'];
$name = $_REQUEST['name'];
$subject = $_REQUEST['subject'];
$message = $_REQUEST['message'];

$headers = "From: $from";
$headers = "From: " . $from . "\r\n";
$headers .= "Reply-To: ". $from . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$subject = "Message from $name.";

$link = '#';

$body = "Thank you $name for choosing Social Surge as your favorite application. We look forward to you to continue to use our application in the future!";


$send = mail($to, $subject, $body, $headers);


?>

<?php
class MyDB extends SQLite3
{
  function __construct()
  {
    $this->open('socialsurge.db');
  }
}
$db = new MyDB();
if(!$db){
  echo $db->lastErrorMsg();
} else {
}

?>



<?php

$name = $_POST['name'];
$email = $_POST['email'];
$phoneNumber= $_POST['phoneNumber'];
$age= $_POST['age'];
$address= $_POST['address'];
$city= $_POST['city'];
$state= $_POST['state'];
$firstPassword= $_POST['password'];
$password = password_hash($firstPassword, PASSWORD_BCRYPT);


$date = date_default_timezone_set('America/Los_Angeles');
$date=date("Y/m/d h:i:sa");




$sql =<<<EOF

INSERT INTO USERS (FULLNAME,EMAILADDRESS,PHONENUMBER,AGE,PASSWORD,ADDRESS,CITY,STATE,DATECREATED) VALUES ('$name','$email','$phoneNumber','$age','$password','$address','$city','$state','$date');



EOF;

$ret = $db->exec($sql);
if(!$ret){
  echo $db->lastErrorMsg();
} else {
}
$db->close();
?>

<?php
echo '<script language="javascript">';
echo 'alert("Thanks for signing up! You are being redirected to the home page.  Check your spam folder for the sign up message.")';
echo '</script>';
echo '<script>window.location.href = "/index.html";</script>';



 ?>
