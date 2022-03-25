<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once 'php/conn.php';
    require_once 'php/classes/dataclass.php';
    
    $table = $_GET['table'];
    if (!isset($table) or $table === "" or $table === NULL) {
        //Define empty result, show tables instead
        $result_state = NULL;

        $result = $conn->query("SHOW TABLES");

        $fields = array();
        while($row = mysqli_fetch_assoc($result)) {
            array_push($fields,$row);
        }

        //Echo all tables w links to them.
        //Echo if empty 
        //Promt creation of new
        
        
    } else {
        $result_state = 1;

        $result = $conn->query("SHOW COLUMNS FROM $table");

        $fields = array();
        
        while($row = mysqli_fetch_assoc($result)) {
            array_push($fields,$row["Field"]);
        }
        
        $dataclass = new dataClass($conn, $table, $fields);

        $columnInfo = $dataclass->getColumnInfo();
    }
?>
<!DOCTYPE html>
<html>
    <?php include 'includes/head.php'; ?>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php
                include 'includes/header.php';
                include 'includes/sidebar.php';
            ?>
            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        <?php 
                            if ($result_state === NULL) {
                                echo "Listing all tables";
                            } else {
                                echo ucfirst($table);
                            }
                        ?>
                        <small><button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modalEdit">NEW</button></small>
                    </h1>
                </section>
                <section class="content container-fluid">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="dataTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example1_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <?php
                                                                if ($result_state === NULL) {
                                                                    foreach ($fields as $field) {                                                                  
                                                                        echo '<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: auto;">' . $field['Tables_in_rewordpress'] . '</th>';
                                                                    }
                                                                } else {
                                                                    foreach ($columnInfo as $column) {                                                                    
                                                                        echo '<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: auto;">' . $column[0] . '</th>';
                                                                    }
                                                                }
                                                            ?>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 150px;">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            if ($result_state === NULL) {
                                                                echo '<tr rile="row">';
                                                                   
                                                                echo '</tr>';
                                                            } else {
                                                                foreach ($dataclass->getData() as $dataId) {
                                                                    /*
                                                                    echo "<pre>";
                                                                    print_r($dataId);
                                                                    "</pre>";
                                                                    */
                                                                    echo '<tr rile="row">';                                                     
                                                                    
                                                                    foreach ($dataId->properties as $data) {
                                                                        echo "<td>" . $data . "</td>";
                                                                    }
                                                                    echo '<td><div class="btn-group">
                                                                        <button type="button" class="btn btn-default btnEdit" data-id="' . $dataId->getId() . '" data-toggle="modal" data-target="#modalEdit">Edit</button>
                                                                        <button type="button" class="btn btn-danger btnDelete" data-id="' . $dataId->getId() . '" data-toggle="modal" data-target="#modalDelete">Delete</button>
                                                                      </div></td>';                                                                    
                                                                    echo '</tr>';
                                                                    
                                                                }
                                                            }
                                                        ?>                                                        
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <?php
                                                                if ($result_state === NULL) {
                                                                    echo "Listing all tables";
                                                                    echo '<th rowspan="1" colspan="1">1</th>';
                                                                } else {
                                                                    foreach ($columnInfo as $column) {
                                                                        echo '<th rowspan="1" colspan="1">' . $column[0] . '</th>';
                                                                    }
                                                                }
                                                            ?>
                                                            <th rowspan="1" colspan="1">Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php
                include 'includes/footer.php';
                include 'includes/modalDelete.php';
                include 'includes/modalEdit.php';
            ?>
        </div>
        <script src="jquery/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/adminlte.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.min.js"></script>
        <script src="js/jquery.slimscroll.min.js"></script>
        <script src="js/fastclick.js"></script>
        <script>
            $( document ).ready(function() {
                //Modal New
                /*
                $('.btnNew').click(function() {
                    $("#modalEditForm").html("");
                            
                    var table = location.search.split('table=')[1];
                    id = $(this).data("id");
                    
                    $.ajax({
                        type: 'POST',
                        url: 'ajax/editGetForm.php',
                        datatype: 'json' ,
                        data: {
                            table: table,
                            id: id
                        },
                        success: function (data) {
                            $("#modalEditForm").append(data);
                        }
                    });
                });
                
                $('#modalBtnEdit').click(function() {
                    var i = 0;
                    var data = [];
                    $('.formAjax').each(function(i) {
                        //console.log(document.getElementsByClassName('formAjax')[i].value);
                        data.push(document.getElementsByClassName('formAjax')[i].value);
                        i++;
                    });
                    
                    var table = location.search.split('table=')[1];
                    $.ajax({
                        type: 'POST',
                        url: 'ajax/editSave.php',
                        datatype: 'json' ,
                        data: {
                            table: table,
                            id: id,
                            data: data
                        },
                        success: console.log("Success!")
                    });
                });
                */

                
                //Modal Edit
                $('.btnEdit').click(function() {
                    $("#modalEditForm").html("");
                            
                    var table = location.search.split('table=')[1];
                    id = $(this).data("id");
                    
                    $.ajax({
                        type: 'POST',
                        url: 'ajax/editGetForm.php',
                        datatype: 'json' ,
                        data: {
                            table: table,
                            id: id
                        },
                        success: function (data) {
                            $("#modalEditForm").append(data);
                        }
                    });
                });
                
                $('#modalBtnEdit').click(function() {
                    var i = 0;
                    var data = [];
                    $('.formAjax').each(function(i) {
                        //console.log(document.getElementsByClassName('formAjax')[i].value);
                        data.push(document.getElementsByClassName('formAjax')[i].value);
                        i++;
                    });
                    
                    var table = location.search.split('table=')[1];
                    $.ajax({
                        type: 'POST',
                        url: 'ajax/editSave.php',
                        datatype: 'json' ,
                        data: {
                            table: table,
                            id: id,
                            data: data
                        },
                        success: console.log("Success!")
                    });
                });
                
                //Modal Delete
                $('.btnDelete').click(function() {
                    dataId = $(this).data("id");
                    console.log(dataId);
                });
                
                $('#modalBtnDelete').click(function() {
                    var table = location.search.split('table=')[1];
                    var id = dataId;
                    
                    console.log(table + " | " + id);
                    
                    $.ajax({
                        type: 'POST',
                        url: 'ajax/delete.php',
                        datatype: 'json' ,
                        data: {
                            table: table,
                            id: id
                        },
                        success: function (data) {
                            console.log(data);
                        }
                    });
                });
            });
            
            $(function () {
                $('#dataTable').DataTable({
                    'paging'      : true,
                    'lengthChange': true,
                    'searching'   : true,
                    'ordering'    : true,
                    'info'        : true,
                    'autoWidth'   : false
                })
            })
        </script>
    </body>
</html>