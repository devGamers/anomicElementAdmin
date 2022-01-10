<!DOCTYPE html>
<html class="loading" lang="fr" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <title>Anomic Elements</title>
    <link rel="apple-touch-icon" href="/public/images/logo.jpg">
    <link rel="shortcut icon" type="image/x-icon" href="/public/images/logo.jpg">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700"
          rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/public/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/public/css/switchery.min.css">
    <link rel="stylesheet" type="text/css" href="/public/css/switch.min.css">
    <link rel="stylesheet" type="text/css" href="/public/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/public/css/palette-switch.min.css">
    <link rel="stylesheet" type="text/css" href="/public/css/toastr.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/public/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="/public/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="/public/css/components.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/public/css/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="/public/css/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="/public/css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/public/css/toastr.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Vendor JS-->
    <script src="/public/js/vendors.min.js" type="text/javascript"></script>
    <script src="/public/js/switchery.min.js" type="text/javascript"></script>
    <script src="/public/js/switch.min.js" type="text/javascript"></script>
    <script src="/public/js/toastr.min.js" type="text/javascript"></script>
    <script src="/public/js/sweetalert2.all.js" type="text/javascript"></script>
    <script src="/public/js/select2.full.min.js" type="text/javascript"></script>
    <script src="/public/js/form-select2.min.js" type="text/javascript"></script>
    <!-- BEGIN Vendor JS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu 2-columns fixed-navbar pace-done menu-expanded" data-open="click" data-menu="vertical-menu"
      data-color="bg-gradient-x-blue-cyan" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="collapse navbar-collapse show" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item mobile-menu d-md-none mr-auto">
                            <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                                <i class="ft-menu font-large-1"></i>
                            </a>
                        </li>
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                                                  href="#"><i class="ft-menu"></i></a></li>
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i
                                        class="ficon ft-maximize"></i></a></li>

                    </ul>
                    <ul class="nav navbar-nav float-right">

                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <span class="avatar avatar-online">
                                    <img src="<?= (isset($_SESSION['profil']) && $_SESSION['profil'] != "") ? $_SESSION['profil']  :
                                        '/public/images/user.png' ?>" alt="<?= $_SESSION['name'] ?>">
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="arrow_box_right">
                                    <a class="dropdown-item" href="#">
                                        <span class="avatar avatar-online">
                                            <img src="<?= (isset($_SESSION['profil']) && $_SESSION['profil'] != "") ?
                                                $_SESSION['profil']  : '/public/images/user.png' ?>" alt="<?= $_SESSION['name'] ?>">
                                            <span class="user-name text-bold-700 ml-1"><?= $_SESSION['username'] ?></span>
                                        </span>
                                    </a>
                                    <div class="dropdown-divider"></div>
<!--                                        <a class="dropdown-item" href="#">-->
<!--                                            <i class="ft-user"></i>-->
<!--                                            Profil-->
<!--                                        </a>-->
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/connexion/deconnexion">
                                        <i class="ft-power"></i>
                                        Déconnexion
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-accordion menu-shadow menu-fixed menu-dark" data-scroll-to-active="true"
         data-img="/public/images/backgrounds/bg-18.jpg">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="/">
                        <img class="brand-logo" alt="Anomic Elements" src="/public/images/logo80.jpg"/>
                        <h3 class="brand-text">Anomic Elements</h3>
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link close-navbar">
                        <i class="ft-x"></i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="navigation-background"></div>

        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li id="menuTableauBord" class="">
                    <a href="/">
                        <i class="ft-home"></i>
                        <span class="menu-title" data-i18n="">Tableau de bord</span>
                    </a>
                </li>
                <li id="menuEvents">
                    <a href="/evenement">
                        <i class="la la-bullhorn"></i>
                        <span class="menu-title" data-i18n="">Evènements</span>
                    </a>
                </li>

                <li class="nav-item has-sub" id="menuArtistes">
                    <a href="#">
                        <i class="ft-users"></i>
                        <span class="menu-title" data-i18n="">Artistes</span>
                    </a>
                    <ul class="menu-content">
                        <li id="menuType">
                            <a class="menu-item" href="/typeArtiste">Type</a>
                        </li>
                        <li id="menuListe">
                            <a class="menu-item" href="/artiste">Liste</a>
                        </li>
                    </ul>
                </li>

                <li id="menuGaleries">
                    <a href="/galerie">
                        <i class="ft-image"></i>
                        <span class="menu-title" data-i18n="">Galeries</span>
                    </a>
                </li>

                <li id="meuMembres">
                    <a href="/membre">
                        <i class="ft-users"></i>
                        <span class="menu-title" data-i18n="">Membres</span>
                    </a>
                </li>

<!--                --><?php //if ($_SESSION['showLogs']) : ?>
<!--                    <li id="menuLogs">-->
<!--                        <a href="/log">-->
<!--                            <i class="ft-settings"></i>-->
<!--                            <span class="menu-title" data-i18n="">Logs</span>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                --><?php //endif; ?>
<!---->
<!--                --><?php //if ($_SESSION['manageUser']) : ?>
<!--                    <li id="menuUsers">-->
<!--                        <a href="">-->
<!--                            <i class="ft-users"></i>-->
<!--                            <span class="menu-title" data-i18n="">Utilisateurs</span>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                --><?php //endif; ?>

            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <?= $content ?>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Footer-->
    <a class="btn btn-try-builder btn-bg-gradient-x-red-pink btn-glow white" href="" target="_blank">
        Réalisé par @devGame & @youss
    </a>

    <footer class="footer footer-light navbar-border navbar-shadow fixed-bottom">
        <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
            <span class="float-md-left d-block d-md-inline-block">2021  &copy; Copyright</span>
        </div>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Theme JS-->
    <script src="/public/js/app-menu.min.js" type="text/javascript"></script>
    <script src="/public/js/app.min.js" type="text/javascript"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script>

        $('.select2').select2()

        const supprimer = (id, page) => {
            swal({
                title: 'Anomic Elements',
                text: "Voulez-vous vraiment supprimer ?",
                type: 'warning',
                confirmButtonText: 'Oui',
                confirmButtonColor: "#d33",
                showCancelButton: true,
                cancelButtonColor: '#3085d6',
                cancelButtonText: "Non"
            }).then(function (choice) {
                if (choice.value) {
                    let xhr = getXhr();
                    xhr.onreadystatechange = function () {
                        // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            console.log(xhr.responseText)
                            if (xhr.responseText === "success") {
                                window.location.href = page
                            } else {
                                swal({
                                    type: 'warning',
                                    title: 'Anomic Elements',
                                    text: "Une erreur s'est produite.",
                                });
                            }
                        }
                    }
                    // Ici on va voir comment faire du post
                    xhr.open("POST", page+"/supprimer", true);
                    // ne pas oublier ça pour le post
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    // ne pas oublier de poster les arguments
                    xhr.send("id=" + id);
                }
            }).catch(swal.noop)
        }

        function getXhr(){
            let xhr = null;
            if(window.XMLHttpRequest) // Firefox et autres
                xhr = new XMLHttpRequest();
            else if(window.ActiveXObject){ // Internet Explorer
                try {
                    xhr = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e) {
                    xhr = new ActiveXObject("Microsoft.XMLHTTP");
                }
            }
            else { // XMLHttpRequest non supporté par le navigateur
                swal({
                    type: 'warning',
                    title: 'Anomic Elements',
                    text: 'Votre navigateur ne supporte pas les objets XMLHTTPRequest...',
                });
                xhr = false;
            }
            return xhr;
        }

         $('#image').change(function () {
            let file = this.files[0],
                size = file.size,
                type = file.type,
                ext = type.split('/')[1],
                extension = ['jpg', 'jpeg', 'JPG', 'JPEG', 'png', 'PNG', 'pdf', 'PDF'];
            if ((size > 1000000) || (extension.indexOf(ext)) < 0) {
                if (size > 1000000) {
                    swal({
                        type: 'warning',
                        title: 'Anomic Elements',
                        text: 'Taille du fichier trop grand ! Veuillez changer le fichier',
                    });
                } else {
                    swal({
                        type: 'warning',
                        title: 'Anomic Elements',
                        text: 'Extension non prise en charge ! Veuillez changer le fichier',
                    });
                }
                $('#image').val("");
            } else {
                let reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }
        })

        function imageIsLoaded(e) {
            //$('#image_preview').css("display", "block");
            document.getElementById('img').value = e.target.result
            $('#previewing').attr('src', e.target.result)
                .attr('width', '150px')
                .attr('height', '150px');
        }

        <?php if(isset($_SESSION['error']) && $_SESSION['error']) : ?>
            toastr.error(
                "Une erreur s'est produite. Contactez l'administrateur.",
                "Anomic Elements",
                {
                    positionClass: "toast-bottom-left",
                    containerId: "toast-bottom-left",
                    showMethod: "slideDown",
                    hideMethod: "slideUp",
                    timeOut: 2e3,
                }
            )
        <?php $_SESSION['error'] = false; unset($_SESSION['error']); endif ?>

        <?php if(isset($_SESSION['add']) && $_SESSION['add']) : ?>
            toastr.success(
                "<?= $_SESSION['texte'] ?>",
                "Anomic Elements",
                {
                    positionClass: "toast-bottom-left",
                    containerId: "toast-bottom-left",
                    showMethod: "slideDown",
                    hideMethod: "slideUp",
                    timeOut: 2e3,
                }
            )
        <?php $_SESSION['add'] = false; unset($_SESSION['add']); unset($_SESSION['texte']); endif ?>

        <?php if(isset($_SESSION['supprimer']) && $_SESSION['supprimer']) : ?>
        toastr.success(
            "<?= $_SESSION['texte'] ?>",
            "Anomic Elements",
            {
                positionClass: "toast-bottom-left",
                containerId: "toast-bottom-left",
                showMethod: "slideDown",
                hideMethod: "slideUp",
                timeOut: 2e3,
            }
        )
        <?php $_SESSION['supprimer'] = false; unset($_SESSION['supprimer']); unset($_SESSION['texte']); endif ?>

        <?php if(isset($_SESSION['update']) && $_SESSION['update']) : ?>
            toastr.success(
                "<?= $_SESSION['texte'] ?>",
                "Anomic Elements",
                {
                    positionClass: "toast-bottom-left",
                    containerId: "toast-bottom-left",
                    showMethod: "slideDown",
                    hideMethod: "slideUp",
                    timeOut: 2e3,
                }
            )
        <?php $_SESSION['update'] = false; unset($_SESSION['update']); unset($_SESSION['texte']); endif ?>

        <?php if(isset($_SESSION['existe']) && $_SESSION['existe']) : ?>
            toastr.warning(
                "Cette donnée existe déjà.",
                "Anomic Elements",
                {
                    positionClass: "toast-bottom-left",
                    containerId: "toast-bottom-left",
                    showMethod: "slideDown",
                    hideMethod: "slideUp",
                    timeOut: 2e3,
                }
            )
        <?php $_SESSION['existe'] = false; unset($_SESSION['existe']); endif ?>
    </script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->
</html>