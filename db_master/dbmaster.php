<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once 'php/conn.php';
    require_once 'php/classes/dataclass.php';
    
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
        
        </script>
    </body>
</html>