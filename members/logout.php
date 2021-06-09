<?php
session_start();
session_unset();
header("refresh:0.1; url=index.php");
?>