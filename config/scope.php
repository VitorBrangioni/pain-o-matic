<?php

session_start();

$scope = null;

if (isset($_SESSION['scope'])) {
    $scope = $_SESSION['scope'];
    unset( $_SESSION['scope'] );
}