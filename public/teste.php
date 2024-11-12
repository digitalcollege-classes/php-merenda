<?php

session_start();

// usuario --> login

// if login === ok

$_SESSION['logged_user'] = [
    'id' => 78,
    'name' => 'Marcus',
];

// logout
unset($_SESSION['logged_user']);
session_destroy();


