<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require_once '../php/conn.php';
    require_once '../php/classes/dataclass.php';

    $table = $_POST['table'];
    $data = $_POST['data'];
    
    $result = $conn->query("SHOW COLUMNS FROM $table");
    $fields = array();
    while($row = mysqli_fetch_assoc($result)) {
        array_push($fields,$row["Field"]);
    }
    
    $newvalues = array();
    
    $dataspecific = new dataClass($conn, $table, $fields);
    foreach ($data as $value) {
        array_push($newvalues,$value);
    }
    array_shift($fields);
    echo print_r($fields);
    echo print_r($newvalues);

    $values = array_combine($fields, $newvalues);
     
   echo $dataspecific->insert($table,$values);
  