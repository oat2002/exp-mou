<?php
session_start();
session_destroy();
header('Location: '.$GLOBALS['path'].'/login');
?>