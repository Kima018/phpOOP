<?php
session_start();
if (isset($_SESSION['registered'])){
    unset($_SESSION['registered']);
}
session_destroy();
header("Location: ../index.php");
exit();

