<?php
session_start();
if (isset($_SESSION["registered"])) {
    unset($_SESSION["registered"]);
}
session_destroy();
header("location:../index.php");
exit();

?>
