<!-- breadcrumb-area -->
<section class="breadcrumb-area pb-70 pt-100 grey-bg" style="background-image:url(/public/img/bg/bg-18.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-md-6 mb-30">
                <div class="breadcrumb-title">
                    <h2>Artistes</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="portfolio-details pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-45">
                <div class="details-thumb">
                    <img src="<?= $one['photo'] ?>" class="img-fluid" alt="<?= $one['name'] ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 mb-30 d-none d-lg-block">
                <div class="project-status">
                    <div class="project-details-title">
                        <ul>
                            <li><b><?= $one['name'] ?></b></li>
                            <li><b>Réseaux</b></li>
                            <?php if($liens != null) : ?>
                                <?php foreach($liens as $key => $lien) : ?>
                                    <li>
                                        <a href="<?= $lien ?>" target="_blank"><?= ucfirst(strtolower($key)) ?></a>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 mb-30">
                <div class="project-desc">
                    <p class="text-justify"><?= nl2br($one['description'] ) ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="related-project  pb-70">
    <div class="container">
        <div class="row">
            <?php foreach ($galeries as $galery) : ?>
            <div class="col-xl-4 col-lg-4 col-md-6 mb-30 grid-item cat-two">
                <div class="portfolio-wrapper">
                    <div class="portfolio-thumb">
                        <img src="<?= $galery['image'] ?>" style="width: 370px; height: 320px" class="img-fluid" alt="Img">
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
    $('#menuArtistes').addClass('menu-active')
</script>