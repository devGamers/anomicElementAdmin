<div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Artiste</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
                <div class="breadcrumb-wrapper mr-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            <a href="index.php?page=artiste">Liste des artistes</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <section id="drag-area">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10 col-12">
                                    <div class="form-group">
                                        <div class="position-relative has-icon-left">
                                            <input type="text" id="search" class="form-control"
                                                   placeholder="Recherche..."
                                                   onkeyup="recherche()"
                                            />
                                            <div class="form-control-position">
                                                <i class="ft-search"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <a href="/artiste/nouveau" class="btn btn-bg-gradient-x-blue-cyan">
                                        <i class="la la-plus-circle"></i> Nouveau
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="resultat">
                <?php foreach ($all as $artiste) : ?>
                    <div class="col-md-4 col-12">
                        <div class="card">
                            <img class="card-img-top img-fluid" src="<?= $artiste['photo'] ?>" alt="<?= $artiste['name'] ?>" />
                            <div class="card-body">
                                <h4 class="card-title"><?= $artiste['name'] ?></h4>
                                <p class="card-text"><?= substr($artiste['description'], 0, 120) ?>...</p>
                                <p class="card-text">
                                    <small class="text-muted"><?= $artiste['libelle'] ?></small>
                                    <a href="/artiste/detail&artiste=<?= $code.'|'.Controller::crypte($artiste['id'], $code) ?>" class="btn btn-bg-gradient-x-blue-green pull-right">
                                        <i class="ft-eye"></i> Afficher
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

    </div>
</div>

<script>
    $('#menuArtistes').addClass('open')
    $('#menuListe').addClass('active')
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