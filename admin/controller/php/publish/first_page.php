<?php
         require '../../../../.config/dbconnect.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $title = $_POST['title'];
                $desc = $_POST['desc'];
                $prov = $_POST['prov'];
                $city = $_POST['city'];
                $address = $_POST['address'];
                $qty = $_POST['qty'];
                $adult = $_POST['max_adult'];
                $pet = $_POST['max_pet'];

                if (empty($pet) || empty($adult) || empty($qty) || empty($address) || empty($city) || empty($prov) || empty($desc) || empty($title)) 
                {
                        echo "empty";
                } else {
                        $_SESSION['pet_tf'] = $pet;
                        $_SESSION['adult_max'] = $adult;
                        $_SESSION['qty'] = $qty;
                        $_SESSION['address'] = $address;
                        $_SESSION['city'] = $city;
                        $_SESSION['prov'] = $prov;
                        $_SESSION['desc'] = $desc;
                        $_SESSION['title'] = $title;

                        echo "success";
                }

        }
?>