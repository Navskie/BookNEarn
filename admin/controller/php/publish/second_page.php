<?php
      require '../../../../.config/dbconnect.php';

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
               $type = $_POST['type'];
               $price = $_POST['price'];
               $adult = $_POST['adult'];
               $pet = $_POST['pet'];
               $eight = $_POST['eight'];
               $four = $_POST['four'];
               $twelve = $_POST['twelve'];
               $overnight = $_POST['overnight'];
               $weekday = $_POST['weekday'];
               $weekend = $_POST['weekend'];

               if (empty($pet) || empty($adult) || empty($price) || empty($type)) 
               {
                     echo "empty";
               } else {
                     $_SESSION['type'] = $type;
                     $_SESSION['price'] = $price;
                     $_SESSION['adult'] = $adult;
                     $_SESSION['pet'] = $pet;
                     $_SESSION['eight'] = $eight;
                     $_SESSION['four'] = $four;
                     $_SESSION['twelve'] = $twelve;
                     $_SESSION['weekend'] = $weekend;
                     $_SESSION['weekday'] = $weekday;
                     $_SESSION['overnight'] = $overnight;
                     

                     echo "success";
               }

      }
?>