<?php

//DB Connection
define("glob_db_host", "127.0.0.1");
define("glob_db_user", "root");
define("glob_db_pwd", "");
define("glob_db_db", "db_master"); 

//Language
define("glob_lang", "en");

//Navigation
$navigation = [
    "Home" => "1",
    "DB Master" => "1",
    "Data Master" => "1",
];
define("glob_sidebar_items", $navigation);

$navigation_icons = [
    "Home" => "fa-home",
    "DB Master" => "fa-database",
    "Data Master" => "fa-server",
];
define("glob_sidebar_item_icons", $navigation_icons);
 
//