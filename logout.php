<?php
    session_start();
    session_destroy();
    session_unset();
    header("Location: http://localhost:3000/login.php")
?>