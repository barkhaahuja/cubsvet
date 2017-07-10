<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
   

    <title>Questionnaire</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $ROOT; ?>/3rdparty/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo $ROOT; ?>/3rdparty/bootstrap/js/html5shiv.js"></script>
    <script src="<?php echo $ROOT; ?>/3rdparty/bootstrap/js/respond.min.js"></script>
    <![endif]-->

    <script src="<?php echo $ROOT; ?>/3rdparty/jquery/jquery-1.10.min.js"></script>

</head>

<body>

<?php echo $this->render($content,$this->mime,get_defined_vars()); ?>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo $ROOT; ?>/3rdparty/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
