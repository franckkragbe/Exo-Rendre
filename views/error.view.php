<?php 
ob_start(); 
?>

<?= $msg; ?>

<?php
$content = ob_get_clean();
$titre = "Erreur !!!";
require "template.php";
?>