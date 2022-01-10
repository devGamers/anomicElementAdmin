<!-- breadcrumb-area -->
<section class="breadcrumb-area pb-70 pt-100 grey-bg" style="background-image:url(public/img/bg/bg-18.jpg)">
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

<section class="service-area pt-100 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4">
                <div class="servicee-sidebar mb-40">
                    <div class="sidebar-download">
                        <h3>Reherche</h3>
                        <input type="text" class="form-control" id="search" onkeyup="recherche()" />
                    </div>
                </div>

                <div class="servicee-sidebar mb-50">
                    <div class="sidebar-link grey-bg">
                        <h3>Catégories</h3>
                        <ul>
                            <li><a class="pointer" onclick="affiche(0)">Tout les artistes</a></li>
                            <?php foreach ($types as $type) : ?>
                                <li>
                                    <a class="pointer" onclick="affiche(<?= $type['id'] ?>)"><?= $type['libelle'] ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8">
                <div class="row" id="resultat">
                    <?php foreach ($artistes as $artiste) : ?>
                        <div class="col-xl-6 col-lg-6 col-md-6 mb-50 ">
                            <div class="services-box">
                                <div class="services-img">
                                    <img src="<?= $artiste['photo'] ?>" class="img-fluid" alt="<?= $artiste['name'] ?>">
                                </div>
                                <div class="services-content">
                                    <div class="card-title">
                                        <h5><?= $artiste['name'] ?></h5>
                                    </div>
                                    <div class="card-text">
                                        <p class="text-justify"><?= substr($artiste['description'], 0, 80) ?>...</p>
                                    </div>

                                    <div>
                                        <a href="/artiste/detail&artiste=<?= $code . '|' . Controller::crypte($artiste['id'], $code) ?>" class="btn">
                                            Lire Plus
                                        </a>
                                        <span class="text-muted float-right"><?= $artiste['libelle'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
</section>


<script>
    $('#menuArtistes').addClass('menu-active')
    resultat = document.getElementById('resultat').innerHTML

    const affiche = type => {
        if (type === 0) {
            document.getElementById('resultat').innerHTML = resultat
        }else{
            let xhr = getXhr();

            xhr.onreadystatechange = function(){
                // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
                if(xhr.readyState === 4 && xhr.status === 200){
                    document.getElementById('resultat').innerHTML = xhr.responseText;
                }
            }

            // Ici on va voir comment faire du post
            xhr.open("POST","/artiste/typeArtiste", true);

            // ne pas oublier ça pour le post
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

            // ne pas oublier de poster les arguments
            xhr.send("type="+type);
        }
    }

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
            xhr.open("POST","/artiste/recherche", true);

            // ne pas oublier ça pour le post
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

            // ne pas oublier de poster les arguments
            xhr.send("search="+search);
        }else{
            document.getElementById('resultat').innerHTML = resultat
        }
    }
</script>