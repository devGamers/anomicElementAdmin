<section class="breadcrumb-area pb-70 pt-100 grey-bg" style="background-image:url(/public/img/bg/bg-18.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-md-6 mb-30">
                <div class="breadcrumb-title">
                    <h2>Events détails</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="basic-blog-area gray-bg pt-100 pb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 blog-post-items">
                <div class="blog-wrapper mb-60">
                    <div class="blog-thumb">
                        <img src="<?= $one['image'] ?>" alt="<?= $one['libelle'] ?>" />
                    </div>
                    <div class="meta-info">
                        <ul>
                            <li class="posts-time">
                                <?= date('d/m/Y', strtotime($one['date'])) ?> de <?= date("H:i", strtotime($one['debut'])) ?> à <?= $one['fin'] ? date("H:i", strtotime($one['fin'])) : '-' ?>
                            </li>
                        </ul>
                    </div>
                    <div class="blog-content">
                        <h2 class="blog-title">
                            <?= $one['libelle'] ?>
                        </h2>
                        <p class="text-justify">
                            <?= nl2br($one['description'] ) ?>
                        </p>
                    </div>
                </div>

                <section class="related-project  pb-70">
                    <div class="container">
                        <div class="row">
                            <?php foreach ($galeries as $galery) : ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 mb-30 grid-item cat-two">
                                    <div class="portfolio-wrapper">
                                        <div class="portfolio-thumb">
                                            <img src="<?= $galery['image'] ?>"  class="img-fluid" alt="Img">
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            </div>

            <div class="col-lg-4 sidebar-blog right-side">

                <div class="widget">
                    <h4 class="widget-title">03 derniers events</h4>
                    <div class="sidebar-rc-post">
                        <ul>
                            <?php $i=1; foreach ($events as $event) : if ($event['id'] != $one['id'] && $i<=3) : ?>
                                <li>
                                    <div class="rc-post-thumb">
                                        <a href="/event/detail&event=<?= $code . '|' . Controller::crypte($event['id'], $code) ?>">
                                            <img src="<?= $event['image'] ?>" alt="<?= $event['libelle'] ?>" />
                                        </a>
                                    </div>
                                    <div class="rc-post-content">
                                        <h4>
                                            <a href="/event/detail&event=<?= $code . '|' . Controller::crypte($event['id'], $code) ?>">
                                                <?= $event['libelle'] ?>
                                            </a>
                                        </h4>
                                        <div class="widget-date"><?= date('d/m/Y', strtotime($event['date'])) ?></div>
                                    </div>
                                </li>
                            <?php $i++; endif; endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#menuEvents').addClass('menu-active')
</script>