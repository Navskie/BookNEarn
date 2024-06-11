<?php

   session_start();

   unset($_SESSION['token']);
   unset($_SESSION['generatedID']);
   unset($_SESSION['role']);

   header('location: index');