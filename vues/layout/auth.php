
<!DOCTYPE html>
<html class="loading" lang="fr" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Anomic Elements</title>
    <link rel="apple-touch-icon" href="public/images/logo.jpg">
    <link rel="shortcut icon" type="image/x-icon" href="public/images/logo.jpg">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="public/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/switchery.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/switch.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/palette-switch.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/toastr.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/components.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="public/css/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/login-register.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/toastr.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Vendor JS-->
    <script src="public/js/vendors.min.js" type="text/javascript"></script>
    <script src="public/js/switchery.min.js" type="text/javascript"></script>
    <script src="public/js/switch.min.js" type="text/javascript"></script>
    <script src="public/js/toastr.min.js" type="text/javascript"></script>
    <!-- BEGIN Vendor JS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu 1-column  bg-full-screen-image blank-page blank-page" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column">
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row"></div>
        <?= $content ?>
    </div>
</div>
<!-- END: Content-->


<!-- BEGIN: Theme JS-->
<script src="public/js/app-menu.min.js" type="text/javascript"></script>
<script src="public/js/app.min.js" type="text/javascript"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="public/js/form-login-register.min.js" type="text/javascript"></script>
<!-- END: Page JS-->

</body>
<!-- END: Body-->
</html>