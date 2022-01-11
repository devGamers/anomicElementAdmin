<!-- breadcrumb-area -->
<section class="breadcrumb-area pb-70 pt-100 grey-bg" style="background-image:url(/public/img/bg/bg-18.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-md-6 mb-30">
                <div class="breadcrumb-title">
                    <h2>Events</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="basic-blog-area gray-bg pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 blog-post-items" id="resultat">
                <?php foreach ($events as $event) : ?>
                    <div class="blog-wrapper mb-40">
                        <div class="blog-thumb">
                            <a href="/event/detail&event=<?= $code . '|' . Controller::crypte($event['id'], $code) ?>">
                                <img src="<?= $event['image'] ?>" alt="<?= $event['libelle'] ?>" />
                            </a>
                        </div>
                        <div class="meta-info">
                            <ul>
                                <li class="posts-time">
                                    <?= date('d/m/Y', strtotime($event['date'])) ?> de <?= date("H:i", strtotime($event['debut'])) ?> à <?= $event['fin'] ? date("H:i", strtotime($event['fin'])) : '-' ?>
                                </li>
                            </ul>
                        </div>
                        <div class="blog-content">
                            <h3 class="blog-title">
                                <a href="/event/detail&event=<?= $code . '|' . Controller::crypte($event['id'], $code) ?>">
                                    <?= $event['libelle'] ?>
                                </a>
                            </h3>
                            <p class="text-justify"><?= substr($event['description'], 0, 160) ?>...</p>
                        </div>
                        <div class="link-box">
                            <a href="/event/detail&event=<?= $code . '|' . Controller::crypte($event['id'], $code) ?>">Lire Plus</a>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

            <div class="col-lg-4 sm-mt sidebar-blog right-side">
                <div class="widget">
                    <h4 class="widget-title">Recherche</h4>
                    <div class="sidebar-form">
                        <form action="#">
                            <input type="text" id="search" onkeyup="recherche()" placeholder="Titre ou description" />
                            <button type="button" onclick="recherche()">
                                <span class="lnr lnr-magnifier"></span>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="widget">
                    <h4 class="widget-title">A venir</h4>
                    <div class="sidebar-rc-post">
                        <ul>
                            <?php foreach ($events as $event) : if (strtotime($event['date']) > strtotime(date('Y-m-d'))) : ?>
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
                            <?php endif; endforeach; ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $('#menuEvents').addClass('menu-active')
    resultat = document.getElementById('resultat').innerHTML

    const recherche = () => {
        let search = document.getElementById('search').value,
            xhr = getXhr();

        if (search !== "") {
            // On défini ce qu'on va faire quand on aura la réponse
            xhr.onreadystatechange = function(){
                // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
                if(xhr.readyState === 4 && xhr.status === 200){
                    document.getElementById('resultat').innerHTML = xhr.responseText;
                }
            }

            // Ici on va voir comment faire du post
            xhr.open("POST","/event/recherche", true);

            // ne pas oublier ça pour le post
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

            // ne pas oublier de poster les arguments
            xhr.send("search="+search);
        }else{
            document.getElementById('resultat').innerHTML = resultat
        }
    }
</script>