<!-- breadcrumb-area -->
<section class="breadcrumb-area pb-70 pt-100 grey-bg" style="background-image:url(/public/img/bg/bg-18.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-md-6 mb-30">
                <div class="breadcrumb-title">
                    <h2>Galerie</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="portfoilo-area pt-100 pb-70">
    <div class="container">
        <div class="row portfolio-active">
            <?php foreach ($galeries as $galery) : ?>
            <div class="col-xl-4 col-lg-4 col-md-6 mb-30 grid-item">
                <div class="portfolio-wrapper">
                    <div class="portfolio-thumb">
                        <img src="<?= $galery['image'] ?>" class="img-fluid" alt="">
                    </div>
                    <?php if ($galery['evenements_id'] != null || $galery['artistes_id'] != null) : ?>
                    <div class="portfolio-content">
                        <?php if ($galery['evenements_id'] != null) : $event->setId($galery['evenements_id']) ?>
                            <h5 style="font-size: 15px">
                                <a href="/event/detail&event=<?= $code . '|' . Controller::crypte($galery['evenements_id'], $code) ?>"><?= $event->readOne()['libelle'] ?></a>
                            </h5>
                        <?php endif ?>
                        <?php if ($galery['artistes_id'] != null) : $arts = explode(',' , $galery['artistes_id']) ?>
                            <?php foreach ($arts as $art) : $artiste->setId($art) ?>
                                <h5 style="font-size: 15px">
                                    <a href="/artiste/detail&artiste=<?= $code . '|' . Controller::crypte($art, $code) ?>"><?= $artiste->readOne()['name'] ?></a>
                                </h5>
                            <?php endforeach; ?>
                        <?php endif ?>
                    </div>
                    <?php endif ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<script>
    $('#menuGaleries ').addClass('menu-active')
</script>