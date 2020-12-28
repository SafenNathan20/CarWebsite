<?php
$_SESSION = array();
session_destroy();
echo '<script>window.location.replace("index.php");</script>';

