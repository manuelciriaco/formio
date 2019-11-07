<!doctype html>
<html ng-app="formioApp">

<head>
    <meta charset="utf-8">
    <title><?php echo (isset($title)) ? $title : "FormIO - GPC" ;?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <!-- <link href="https://fonts.googleapis.com/css?family=Vast+Shadow" rel="stylesheet" type="text/css"> -->
    <script src="https://maps.google.com/maps/api/js"></script>
    <script src="//cdn.ckeditor.com/4.7.1/full/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.5/ace.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.5/ext-language_tools.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.5/ext-language_tools.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/styles/app-86bcba9989.css">
    <link rel="stylesheet" href="assets/styles/vendor-0ffa131bfe.css">
    <!--
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css"/>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script> -->

</head>

<body>
<!--[if lt IE 10]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header"><button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                           data-target="#navbar" aria-expanded="false" aria-controls="navbar"><span class="sr-only">Toggle
            navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span
                        class="icon-bar"></span></button> <a class="navbar-brand logo" href="#"
                                                             onclick="window.location.reload(true)"><img src="assets/images/gpc.png"></a></div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li ng-if="authenticated" ><a href="#/">Inicio</a></li>
                <li ng-if="authenticated" class="active"><a href="#/">Administración</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li ng-if="authenticated"><a href="#" ng-click="logout()"><span class="glyphicon glyphicon-off"
                                                                                aria-hidden="true"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>