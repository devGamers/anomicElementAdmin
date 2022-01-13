<div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Tableau de bord</h3>
        </div>

    </div>

    <div class="content-body">
        <section id="drag-area">
            <div class="row">
                <div class="col-md-12">

                    <!-- Minimal statistics with bg color section start -->
                    <section id="minimal-statistics-bg">
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-x-purple-blue">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-top">
                                                    <i class="la la-bullhorn icon-opacity text-white font-large-4 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right align-self-bottom mt-3">
                                                    <span class="d-block mb-1 font-medium-1">Evènements</span>
                                                    <h1 class="text-white mb-0">
                                                        <?= Controller::formatNumber(count($events)) ?>
                                                    </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-x-purple-red">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-top">
                                                    <i class="la la-users icon-opacity text-white font-large-4 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right align-self-bottom mt-3">
                                                    <span class="d-block mb-1 font-medium-1">Artistes</span>
                                                    <h1 class="text-white mb-0">
                                                        <?= Controller::formatNumber(count($artistes)) ?>
                                                    </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-x-blue-green">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-top">
                                                    <i class="la la-picture-o icon-opacity text-white font-large-4 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right align-self-bottom mt-3">
                                                    <span class="d-block mb-1 font-medium-1">Galeries</span>
                                                    <h1 class="text-white mb-0"><?= Controller::formatNumber(count($galeries)) ?></h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card bg-gradient-x-orange-yellow">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-top">
                                                    <i class="la la-users icon-opacity text-white font-large-4 float-left"></i>
                                                </div>
                                                <div class="media-body text-white text-right align-self-bottom mt-3">
                                                    <span class="d-block mb-1 font-medium-1">Membres</span>
                                                    <h1 class="text-white mb-0">
                                                        <?= Controller::formatNumber(count($membres)) ?>
                                                    </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
            </div>
        </section>

    </div>
</div>

<script>
    $('#menuTableauBord').addClass('active')

    <?php if(isset($_SESSION['welcome']) && $_SESSION['welcome']) : ?>
        toastr.success(
            "Bienvenu <?= $_SESSION['name'] ?>.",
            "Anomic Elements",
            {
                positionClass: "toast-bottom-left",
                containerId: "toast-bottom-left",
                showMethod: "slideDown",
                hideMethod: "slideUp",
                timeOut: 2e3,
            }
        )
    <?php $_SESSION['welcome'] = false; endif ?>
</script>