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
                            <a href="index.php?page=evenement">Liste des types d'artiste</a>
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
                            <form action="/typeArtiste/action" method="post">
                                <input type="hidden" name="action" value="0" id="action">
                                <div class="row">
                                    <div class="col-md-8 col-12">
                                        <div class="form-group">
                                            <div class="position-relative has-icon-left">
                                                <input type="text" id="search" class="form-control" autocomplete="off"
                                                       placeholder="Ajout / Modification / Recherche..." required
                                                       name="libelle" onkeyup="recherche()"
                                                />
                                                <div class="form-control-position">
                                                    <i class="ft-activity"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <button type="submit" class="btn btn-bg-gradient-x-blue-cyan" id="btnAction">
                                            <i class="la la-save"></i> Ajouter
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <button type="reset" class="btn btn-bg-gradient-x-orange-yellow" onclick="annuler()">
                                            <i class="ft-x"></i> Annuler
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body row" id="resultat">

                                <?php foreach ($all as $item) : ?>
                                    <div class="col-md-4 col-12 alert round bg-gradient-directional-cyan alert-icon-left mb-2" role="alert">
                                        <span class="alert-icon cursor-pointer" onclick="update(<?= $item['id'] ?>)">
                                            <i class="la la-pencil-square"></i>
                                        </span>

                                        <?php $artiste->setTypeArtistesId($item['id']); ?>

                                        <?php if ($artiste->numberOfArtisteByType()['nbr'] == 0) : ?>
                                            <button type="button" class="close" aria-label="Close"  onclick="supprimer('<?= $item['id'] ?>', '/typeArtiste')">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        <?php endif; ?>

                                       <?= $item['libelle'] ?>

                                        <span class="badge badge badge-pill badge-dark float-right mr-2">
                                            <?= Controller::formatNumber($artiste->numberOfArtisteByType()['nbr']) ?> Artiste(s)
                                        </span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>

<script>
    $('#menuArtistes').addClass('open')
    $('#menuType').addClass('active')
    resultat = document.getElementById('resultat').innerHTML

    const annuler = () => {
        document.getElementById('action').value = 0;
        document.getElementById('btnAction').innerHTML = '<i class="la la-save"></i> Ajouter';
        document.getElementById('resultat').innerHTML = resultat
    }

    const update = id => {
        let xhr = getXhr();
        xhr.onreadystatechange = function(){
            // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
            if(xhr.readyState === 4 && xhr.status === 200){
                document.getElementById('search').value = xhr.responseText;
                document.getElementById('action').value = id;
                document.getElementById('btnAction').innerHTML = '<i class="la la-pencil-square"></i> Modifier';
            }
        }

        xhr.open("POST","/typeArtiste/modifier", true);

        // ne pas oublier ça pour le post
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

        // ne pas oublier de poster les arguments
        xhr.send("id="+id);
    }

    const recherche = () => {
        let search = document.getElementById('search').value, xhr = getXhr();

        if (search !== "") {
            // On défini ce qu'on va faire quand on aura la réponse
            xhr.onreadystatechange = function(){
                // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
                if(xhr.readyState === 4 && xhr.status === 200){
                    document.getElementById('resultat').innerHTML = xhr.responseText;
                }
            }

            // Ici on va voir comment faire du post
            xhr.open("POST","/typeArtiste/recherche", true);

            // ne pas oublier ça pour le post
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

            // ne pas oublier de poster les arguments
            xhr.send("search="+search);
        }else{
            document.getElementById('resultat').innerHTML = resultat
        }
    }
</script>