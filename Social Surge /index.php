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


$from = "oquraishi1@live.maryville.edu";
$to = $_REQUEST['email'];
$name = $_REQUEST['name'];

$headers = "From: Social Surge Contact";
$headers = "From: " . $from . "\r\n";
$headers .= "Reply-To: ". $from . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$subject = "Sign up Notification for Rewards Users from Social Surge.";

$link = '#';

$body = "Thank you for becoming a Social Surge Rewards. Stay tuned for emails that will help you save on your future transactions. We will be in touch soon!  If you no longer wish to be rewards user respond to this message in order to be removed.";


$send = mail($to, $subject, $body, $headers);


?>






 <?php
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phoneNumber=$_POST['phoneNumber'];



   $sql =<<<EOF
      INSERT INTO SUBSCRIPTION (FULLNAME,EMAILADDRESS,PHONENUMBER) VALUES ('$name','$email','$phoneNumber');


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
echo '<script>window.location.href = "/index.html";</script>';

 ?>
