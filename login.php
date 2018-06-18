<?php
   if ($_POST["userPassword"] == "hi") {
      echo "Welcome ". $_POST['userPassword']. "<br />";
      
      exit();
   }
?>