<!-- breadcrumb-area -->
<section class="breadcrumb-area pb-50 pt-100 grey-bg" style="background-image:url(/public/img/bg/bg-18.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-md-6 mb-30">
                <div class="breadcrumb-title">
                    <h2>Info & Contact</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- about-area -->
<section class="about-area pb-50 pt-50">
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
                        fougue et celle du /public Psytrance.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- contact-area -->
<section class="contact-area grey-bg pb-50 pt-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-4 text-center text-md-left mb-30">
                <div class="contact-person">
                    <a href="javascript:void(0)"><i class="far fa-building"></i>Organisation à but non lucratif</a>
                </div>
            </div>
            <div class="col-xl-4 col-md-4 text-center text-md-left mb-30">
                <div class="contact-person">
                    <a href="javascript:void(0)" class=""><i class="fas fa-phone"></i>+33 6 20 70 54 38</a>
                </div>
            </div>
            <div class="col-xl-4 col-md-4 text-center text-md-left mb-30">
                <div class="contact-person">
                    <a href="javascript:void(0)" class=""><i class="far fa-envelope"></i>anomicelements@gmail.com</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Membre -->
<section class="service-area white-bg pb-50 pt-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 text-center mb-40">
                <div class="section-title service-title">
                    <h2>Nos membres</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($membres as $membre) : ?>
                <div class="col-lg-4 col-md-6 text-center mb-30">
                    <div class="features-wrap">
                        <div class="features-icon">
                            <span class="lnr lnr-user"></span>
                        </div>
                        <h4 class="text-dark"><?= $membre['name'] ?></h4>
                        <a href="javascript:void(0)"><?= $membre['role'] ?></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
    $('#menuContact').addClass('menu-active')
</script>