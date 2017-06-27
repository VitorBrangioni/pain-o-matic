<?php

if (isset($_POST['id'])) {
	session_start();
	$_SESSION['appointmentId'] = $_POST['id'];
}
