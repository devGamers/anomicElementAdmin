<!-- slider-area -->
<section class="slider-area">
    <div class="slider-active">
        <div class="single-slider slider-bg d-flex align-items-center"
             style="background-image:url(public/img/slides/slide_1.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider-content">
                            <h1 data-animation="fadeInDown" data-delay=".2s">ANOMIC DISTORSIONS #3 <br>TROMO,
                                KAIKKIALLA, THE HORRIDS, SYNEMA</h1>
                            <p data-animation="fadeInLeft" data-delay=".4s">
                                Soirée réservée aux personnes majeures, une pièce d'identité vous sera demandée à
                                l'entrée de l'événement.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider slider-bg d-flex align-items-center"
             style="background-image:url(public/img/slides/slide_2.png)">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider-content">
                            <h1 data-animation="fadeInUp" data-delay=".2s">Qu'est-ce que <br/> le Lorem Ipsum</h1>
                            <p data-animation="fadeInLeft" data-delay=".4s">
                                On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est
                                source de distractions, et empêche de se concentrer
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider slider-bg d-flex align-items-center"
             style="background-image:url(public/img/slides/slide_3.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider-content">
                            <h1 data-animation="fadeInUp" data-delay=".2s">Meet with us to <br>success dream</h1>
                            <p data-animation="fadeInLeft" data-delay=".4s">There are many variations of passages of
                                Lorem Ipsum available but the majority have sufered <br>alteration
                                in some form by injected humour randomised</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- about-area -->
<section class="about-area pb-60 pt-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 mb-40">
                <div class="section-title">
                    <h2>A Propos</h2>
                </div>
                <div class="about-content">
                    <p class="text-justify">
                        Anomic Element, c’est le projet commun d’une bande de potes passionnés par la culture Psytrance.
                        Ce projet associatif s’inscrit dans une longue épopée, parsemée de moments partagés dans des
                        événements en tous genres, il s’est peu à peu concrétisé grâce à ses éléments moteurs.
                        Partant de simples discussions, né d’un courant d’air, ce projet est désormais en train de
                        gonfler ses voiles !
                        <br>
                        Cette bande de potes se disait « et pourquoi pas nous ? », c’est vrai ça, pourquoi pas ? Si on
                        est aussi passionnés par la musique et par tous ces univers farfelus dans lesquels les soirées
                        Psy nous plongent, on doit être capable de le partager aussi ! <br>
                        Maintenant que c’est concret, l’idée principale de notre association est d’organiser des soirées
                        Psytrance, mais pas que, on aime bien la Psytrance aussi ! <br>
                        Ce genre musical étant d’une largeur parfois insolente, il offre un nombre incalculable de
                        possibilités en termes de création d’ambiances et d’atmosphères. <br>
                        On cherchera à explorer ces atmosphères avec vous pour vous plonger à notre tour dans des
                        univers fantaisistes, grâce à des décors réfléchis, créés pour mettre en valeur les artistes et
                        le thème de chaque événement. <br>
                        Issus des Free Parties, notre collectif est adepte du partage et de l’ouverture d’esprit, mais
                        pas que, on aime surtout cette ambiance où chacun des éléments éclaire les autres de son brin de
                        folie, c’est de là qu’est venu le nom du projet. <br>
                        Des éléments anomiques sont des éléments qui ne respectent pas les lois et les normes de
                        l’environnement dans lequel ils évoluent. On s’est dit que ce terme reflétait plutôt bien notre
                        fougue et celle du public Psytrance.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- counter-area -->
<div class="counter-area pb-100 pt-100" data-overlay="7" style="background-image:url(public/img/bg/bg-18.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-4 col-sm-6 z-index">
                <div class="single-counter text-center mb-30">
                    <span class="lnr lnr-users"></span>
                    <div class="counter">
                        <?= Controller::formatNumber(count($artistes)) ?>
                    </div>
                    <p>Artistes</p>
                </div>
            </div>
            <div class="col-xl-4 col-md-4 col-sm-6 z-index">
                <div class="single-counter text-center mb-30">
                    <span class="lnr lnr-bullhorn"></span>
                    <div class="counter">
                        <?= Controller::formatNumber(count($events)) ?>
                    </div>
                    <p>Evènements</p>
                </div>
            </div>
            <div class="col-xl-3 col-md-3 col-sm-6 z-index">
                <div class="single-counter text-center mb-30">
                    <span class="lnr lnr-users"></span>
                    <div class="counter">
                        <?= Controller::formatNumber(count($events)) ?>
                    </div>
                    <p>Membres</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- blog-area -->
<section class="blog-area grey-bg pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 text-center pb-40">
                <div class="section-title service-title">
                    <h2>Evènements récents</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $i = 0; foreach ($events as $event) : if ($i <= 2) : ?>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                    <div class="blog-wrapper home-blog-wrapper white-bg">
                        <div class="blog-thumb">
                            <a href="/events/detail&event=<?= $code.'|'.Controller::crypte($event['id'], $code) ?>">
                                <img src="<?= $event['image'] ?>" alt=""/>
                            </a>
                        </div>
                        <div class="meta-info">
                            <ul>
                                <li class="posts-time">
                                    <?= date("d/m/Y", strtotime($event['date'])) ?>
                                    de
                                    <?= date("H:i", strtotime($event['debut'])) ?>
                                    à
                                    <?= $event['fin'] ? date("H:i", strtotime($event['fin'])) : '-' ?>
                                </li>
                            </ul>
                        </div>
                        <div class="blog-content home-blog">
                            <h2 class="blog-title">
                                <a href="/events/detail&event=<?= $code.'|'.Controller::crypte($event['id'], $code) ?>"><?= substr($event['libelle'], 0, 30) ?>...</a>
                            </h2>
                            <p><?= substr($event['description'], 0, 80) ?>...</p>
                        </div>
                        <div class="link-box home-blog-link">
                            <a href="/events/detail&event=<?= $code.'|'.Controller::crypte($event['id'], $code) ?>">Lire Plus</a>
                        </div>
                    </div>
                </div>
            <?php $i++; endif; endforeach; ?>
        </div>
    </div>
</section>

<script>
    $('#menuNews').addClass('menu-active')
</script>