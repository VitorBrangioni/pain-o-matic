<?php
$pwd = "senha";
$currentHashAlgorithm = PASSWORD_DEFAULT;
$currentHashOptions = ['cost' => 15];

echo password_hash($pwd, $currentHashAlgorithm, $currentHashOptions);