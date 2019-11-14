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

    $email=$_POST['nl-email'];



   $sql =<<<EOF
      INSERT INTO NEWSLETTER (EMAILADDRESS) VALUES ('$email');


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
echo 'alert("You have successfully signed up in the newsletter")';
echo '</script>';

echo '<script>window.location.href = "/index.html";</script>';








 ?>
