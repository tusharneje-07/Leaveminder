<?php
session_destroy();
echo "Logged Out";
header('Location: '."auth.php");
?>