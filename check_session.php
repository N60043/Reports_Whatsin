<?php
session_start();
if(time() - $_SESSION['timestamp'] > 900) { //subtract new timestamp from the old one
    unset($_SESSION['username'], $_SESSION['user_id'], $_SESSION['timestamp']);
    header("Location: login.php"); //redirect to index.php
    exit;
} else {
    $_SESSION['timestamp'] = time(); //set new timestamp
}
?>