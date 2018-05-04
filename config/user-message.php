<?php

$userMessage = null;

if (isset($_SESSION['user-message'])) {
    $userMessage = $_SESSION['user-message'];
    unset( $_SESSION['user-message'] );
}