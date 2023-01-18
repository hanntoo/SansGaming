<?php
session_start();
session_unset();
session_destroy();

setcookie('id', '', time() - 3600);
setcookie('key', '', time() - 3600);
echo "alert('Anda Telah Logout..!!')";
header("Location: ../index.php");
