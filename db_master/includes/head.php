<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php
        $currpage = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
        if ($currpage === "index") {
            $title = "Home";
        } else if ($currpage === "datamaster") {
            if ($table != "") {
                $title = ucfirst($table) . " | ReWordpress";
            } else {
                $title = "Datamaster";
            }
        } else {
            $title = ucfirst($currpage);   
        }
    ?>
    <title><?php echo $title; ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/a0f661424f.js"></script>
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <link rel="stylesheet" href="css/skins/skin-blue.min.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>