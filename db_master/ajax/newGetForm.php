<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require_once '../php/conn.php';
    require_once '../php/classes/dataclass.php';

    $table = $_POST['table'];

    $result = $conn->query("SHOW COLUMNS FROM $table");
    $fields = array();
    while($row = mysqli_fetch_assoc($result)) {
        array_push($fields,$row["Field"]);
    }
    
    $dataspecific = new dataClass($conn, $table, $fields);
    $dataclass = new dataClass($conn, $table, $fields);
    $columnInfo = $dataclass->getColumnInfo();
    
    $form = array();
    foreach ($columnInfo as $column) {
        $value = $dataspecific->properties[$column[0]];
        
        $columnComment = $column[2];
        switch ($columnComment) {
            case 'id':
                break;
            case 'textinput':
                echo '<div class="form-group"><label for="input' . ucfirst($column[0]) . '">' . ucfirst($column[0]) . '</label><input type="text" class="form-control formAjax" id="input' . ucfirst($column[0]) . '" value=""></div>';
                break;
            case 'textarea':
                echo '<div class="form-group"><label for="input' . ucfirst($column[0]) . '">' . ucfirst($column[0]) . '</label><input type="text" class="form-control formAjax" id="input' . ucfirst($column[0]) . '" value=""></div>';
                break;
            case 'dropdown':
                echo '<div class="form-group"><label for="input' . ucfirst($column[0]) . '">' . ucfirst($column[0]) . '</label><input type="text" class="form-control formAjax" id="input' . ucfirst($column[0]) . '" value=""></div>';
                break;
            default:
                echo '<div class="form-group"><label for="input' . ucfirst($column[0]) . '">' . ucfirst($column[0]) . '</label><input type="text" class="form-control formAjax" id="input' . ucfirst($column[0]) . '" value=""></div>';
        }
        array_push($form,$columnComment);
    }
    