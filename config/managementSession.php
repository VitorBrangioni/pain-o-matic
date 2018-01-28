<?php

session_start();

if ($_SESSION['userLoggedIn'] !== 'true') {
    header('HTTP/1.1 501 Redirect');
	header('Location: /public'); 
}