<div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Galerie</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
                <div class="breadcrumb-wrapper mr-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Liste des images de la galerie</li>
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
                                <div class="col-md-1 col-12">
                                    <a href="/galerie" class="btn btn-bg-gradient-x-orange-yellow">
                                        <i class="la la-refresh"></i>
                                    </a>
                                </div>

                                <div class="col-md-5 col-12">
                                    <div class="form-group">
                                        <select class="select2 form-control" id="event" name="event" onchange="recherche('event')">
                                            <option value="">Recherche par évènement</option>
                                            <?php foreach ($event->readAll() as $ev) : ?>
                                                <option value="<?= $ev['id'] ?>"><?= $ev['libelle'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <select class="select2 form-control" id="artiste" onchange="recherche('artiste')">
                                            <option value="">Recherche par artiste</option>
                                            <?php foreach ($artiste->readAll() as $ev) : ?>
                                                <option value="<?= $ev['id'] ?>"><?= $ev['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <a href="/galerie/nouveau" class="btn btn-bg-gradient-x-blue-cyan">
                                        <i class="la la-plus-circle"></i> Nouveau
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="resultat">
                <?php foreach ($all as $galerie) : ?>
                    <div class="col-md-4 col-12">
                        <div class="card">
                            <img class="card-img-top img-fluid" style="max-height: 278px;" src="<?= $galerie['image'] ?>" alt="Image" />

                            <div class="card-body">
                                <?php if($galerie['evenements_id']) : $event->setId($galerie['evenements_id']); ?>
                                    <div title="Evènement" class="alert round bg-gradient-directional-cyan alert-icon-right" role="alert" style="padding: 0.5rem 1rem">
                                        <span class="alert-icon">
                                            <i class="la la-bullhorn"></i>
                                        </span>
                                        <?= $event->readOne()['libelle'] ?>
                                    </div>
                                <?php endif; ?>

                                <?php if($galerie['artistes_id']) : $art = explode(',', $galerie['artistes_id']); foreach ($art as $artId) : $artiste->setId($artId); ?>
                                    <div title="Artistes" class="alert round bg-gradient-directional-blue-grey alert-icon-right" role="alert" style="padding: 0.5rem 1rem">
                                        <span class="alert-icon">
                                            <i class="la la-user"></i>
                                        </span>
                                        <?= $artiste->readOne()['name'] ?>
                                    </div>
                                <?php endforeach; endif; ?>

                                <p class="card-text">
                                    <button type="button" class="btn btn-bg-gradient-x-red-pink pull-right" onclick="supprimer('<?= $code.'|'.Controller::crypte($galerie['id'], $code) ?>', '/galerie')">
                                        <i class="la la-trash"></i> Supprimer
                                    </button>
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
    $('#menuGaleries').addClass('active')
    resultat = document.getElementById('resultat').innerHTML

    const recherche = (type) => {
        let search = document.getElementById(type).value + '€' + type,
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
            xhr.open("POST","/galerie/recherche", true);

            // ne pas oublier ça pour le post
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

            // ne pas oublier de poster les arguments
            xhr.send("search="+search);
        }else{
            document.getElementById('resultat').innerHTML = resultat
        }
    }
</script>