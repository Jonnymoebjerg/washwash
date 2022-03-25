<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require_once '../php/conn.php';
    require_once '../php/classes/dataclass.php';

    $table = $_POST['table'];
    $dataId = $_POST['id'];

    $fields = array("id");
    $dataclass = new dataClass($conn, $table, $fields);
    $dataclass->delete($dataId);