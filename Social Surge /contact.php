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

$body = "Thank you for your submission. We will be in touch soon!";


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

if(isset($_POST['preferredMethod']) == 'email') {
  $preferredMethod = 'email';
}

if(isset($_POST['preferredMethod']) == 'phone') {
  $preferredMethod = 'phone';
}


$email = $_POST['email'];
$phoneNumber= $_POST['phoneNumber'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$date = date_default_timezone_set('America/Los_Angeles');
$date=date("Y/m/d h:i:sa");


$sql =<<<EOF
INSERT INTO CONTACT (FULLNAME,EMAILADDRESS,PHONENUMBER,PREFERREDCOMMUNICATION,SUBJECT,MESSAGE,DATECREATED) VALUES ('$name','$email','$phoneNumber','$preferredMethod','$subject','$message','$date');


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
echo 'alert("message successfully sent")';
echo '</script>';

echo '<script>window.location.href = "/contact.html";</script>';





 ?>
