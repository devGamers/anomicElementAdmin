<div class="content-body">
    <section class="flexbox-container">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-lg-4 col-md-6 col-10 box-shadow-2 p-0">
                <div class="card border-grey border-lighten-3 px-1 py-1 m-0">

                    <div class="card-header border-0">
                        <div class="text-center mb-1">
                            <img src="public/images/logo80.jpg" alt="Anomic Elements">
                        </div>
                        <div class="font-large-1  text-center">
                            Connexion
                        </div>
                    </div>

                    <div class="card-content">

                        <div class="card-body">
                            <form class="form-horizontal" action="index.php?page=connexion/login" method="post">
                                <fieldset class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control round" name="username" id="user-name" placeholder="Nom d'utilisateur" required autocomplete="off" />
                                    <div class="form-control-position">
                                        <i class="ft-user"></i>
                                    </div>
                                </fieldset>

                                <fieldset class="form-group position-relative has-icon-left">
                                    <input type="password" class="form-control round" name="password" id="user-password" placeholder="Mot de passe" required />
                                    <div class="form-control-position">
                                        <i class="ft-lock"></i>
                                    </div>
                                </fieldset>

                                <div class="form-group text-center">
                                    <button type="submit" class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">Se connecter</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    <?php if(isset($_SESSION['echec']) && $_SESSION['echec']) : ?>
        toastr.error("Authentification échouée.", "Anomic Elements", {
            showMethod: "slideDown",
            hideMethod: "slideUp",
            timeOut: 2e3
        })
    <?php $_SESSION['echec'] = false; unset($_SESSION['echec']); endif ?>

    <?php if(isset($_SESSION['error']) && $_SESSION['error']) : ?>
        toastr.error("Authentification échouée. Contactez les adminstrateurs au besoin.", "Anomic Elements", {
            showMethod: "slideDown",
            hideMethod: "slideUp",
            timeOut: 2e3
        })
    <?php $_SESSION['error'] = false; unset($_SESSION['error']); endif ?>
</script>
