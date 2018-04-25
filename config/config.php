<?php

const PRODUCTION = false;

if (PRODUCTION === true) {
    define("BASE_URI", "");
    define("BASE_URL", 100);
} elseif (PRODUCTION === false) {
    define('BASE_URI', '/var/www/html/pain-o-matic/');
    define('BASE_URL', 'localhost/');
}

const DIR_IMG = BASE_URL.'view/images/';
const DIR_VIEW = BASE_URL.'view/internal/';
const DIR_DIAGRAMS = DIR_IMG.'diagrams/';
const DIR_PATIENT_PROFILE = '';























const BASE_URI = '/var/www/html/pain-o-matic/';
const BASE_URL = 'localhost/pain-o-matic/';
const DIR_IMG = BASE_URL.'view/images/';
const DIR_DIAGRAMS = DIR_IMG.'diagrams/';
// define('DIR_DIAGRAMS', 'localhost/pain-o-matic/view/images/diagrams/');
const DIR_PATIENT_PROFILE = '';

$step1 = 'disabled';
$step2 = 'disabled';
$step3 = 'disabled';
$step4 = 'disabled';



if (PRODUCTION === true) {
    // add url de producao
} elseif (PRODUCTION === false) {
    // add urls localhost
}


