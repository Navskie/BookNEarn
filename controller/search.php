   <?php

      include "../.config/dbconnect.php";

      if(isset($_POST['query'])) {
         $input = $_POST['query'];
         $sql = mysqli_query($con, "SELECT citymunDesc FROM refcitymun WHERE citymunDesc LIKE '%$input%' LIMIT 8");
         
         if (mysqli_num_rows($sql) > 0) {
               foreach ($sql as $row) {
                  echo '<a href="#" class="list">'.$row["citymunDesc"].'</a>';
               }
         } else {
               echo '<span class="list">No record found</span>';
         }
      }
      
   ?>