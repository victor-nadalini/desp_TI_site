<?php
session_start();
if(!isset($_SESSION['id_usuario']))
{
    header("location: desp login.php");
    exit;
}
?>