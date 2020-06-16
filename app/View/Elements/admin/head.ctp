<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title_for_layout; ?></title>
    <?php
        echo $this->Html->css(array(
            '../template_admin/vendor/bootstrap/css/bootstrap.min',
            '../template_admin/vendor/metisMenu/metisMenu.min',
            '../template_admin/dist/css/sb-admin-2',
            '../template_admin/vendor/font-awesome/css/font-awesome.min'
        ));
    ?>
    <?php
        echo $this->Html->script(array(
            '../template_admin/vendor/jquery/jquery.min',
            '../template_admin/vendor/bootstrap/js/bootstrap.min',
            '../template_admin/vendor/metisMenu/metisMenu.min',
            '../template_admin/dist/js/sb-admin-2'
        ));
    ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>