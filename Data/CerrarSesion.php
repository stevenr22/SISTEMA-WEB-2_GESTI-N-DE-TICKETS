<!--SCRIPT PARA CERRRAR SESION-->
<?php
session_start();
session_destroy();
header("Location: ../index.php");
exit();
?>