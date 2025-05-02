<?php
    session_start();
    session_unset();
    session_destroy();
    header("loginadmin.php");
?>