<?php
ob_start();
SESSION_start();
if (isset($_SESSION['adm'])) {
   $pageTitle = 'Home';
   include 'init.php';
?>












   <?php




   include  $tpl . 'footer.php';
} else {
   header('location: ../index.php');
}
ob_end_flush();
?>