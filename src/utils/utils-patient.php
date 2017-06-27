<?php

if (isset($_POST['id'])) {
	session_start();
	$_SESSION['patientId'] = $_POST['id'];
}