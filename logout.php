<?php
session_start();
unset($_SESSION['user_email']);
echo"<script>alert('Your account has been logged out!')</script>";
echo"<script>window.open('index.php','_self')</script>";
?>
