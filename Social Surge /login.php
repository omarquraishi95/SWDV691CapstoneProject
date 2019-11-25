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
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];



   $sql =<<<EOF
      INSERT INTO LOGIN (EMAILADDRESS,PASSWORD) VALUES ('$email','$password');


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
echo 'alert("Login successfully established redirecting to home page.")';
echo '</script>';
echo '<script>window.location.href = "/index.html";</script>';

 ?>
