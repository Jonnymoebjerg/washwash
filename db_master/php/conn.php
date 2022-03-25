<?php
require_once 'globals/settings.php';

$conn = new mysqli(glob_db_host, glob_db_user, glob_db_pwd, glob_db_db);

if ($conn->connect_error) {
    die();
}

$conn->set_charset('utf8');