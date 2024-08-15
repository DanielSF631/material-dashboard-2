<?php
session_start();

if(isset($_SESSION['id'])) {
    $last_activity = $_SESSION['last_activity'];
    $inactive_timeout = 1800; // 30 minutos (en segundos)
    $current_time = time();

    if(($current_time - $last_activity) > $inactive_timeout) {
        header("Location: ../logout.php");
        exit;
    }

    $_SESSION['last_activity'] = $current_time;
} else {
    header("Location: ../login.php");
    exit;
}
?>
