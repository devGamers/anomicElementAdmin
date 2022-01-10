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
                        <li class="breadcrumb-item">
                            <a href="/artiste">Liste des artistes</a>
                        </li>
                        <li class="breadcrumb-item active">Détail</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <section id="drag-area">
            <div class="row">

                <?php if ($one) : ?>
                    <div class="col-md-4 col-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="card-title-wrap bar-primary">
                                    <div class="card-title"><?= $one['name'] ?></div>
                                </div>
                                <p class="card-subtitle text-muted mb-0 pt-1">
                                    <span class="font-small-3"><?= $one['libelle'] ?></span>
                                </p>
                            </div>
                            <img class="card-img-top img-fluid" src="<?= $one['photo'] ?>" alt="<?= $one['name'] ?>" />

                            <?php if($liens != null) : ?>
                            <div class="card-body">
                                <div class="row align-middle">
                                    <?php foreach($liens as $key => $lien) : ?>
                                        <div class="col-md-4 col-12">
                                            <a class="btn btn-bg-gradient-x-blue-green" target="_blank" href="<?= $lien ?>"><?= ucfirst(strtolower($key)) ?></a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            <div class="card-footer border-top-blue-grey border-top-lighten-5">
                                <div class="form-actions pull-right">
                                    <a class="btn btn-bg-gradient-x-orange-yellow mr-1" href="/artiste/modifier&artiste=<?= $id ?>">
                                        <i class="la la-pencil"></i> Modifier
                                    </a>
                                    <button type="button" class="btn btn-bg-gradient-x-red-pink" onclick="supprimer('<?= $id ?>', '/artiste')">
                                        <i class="la la-trash"></i> Supprimer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 col-12">
                        <div class="card">
                            <div class="card-body">
                                <p class="line-height-2 text-justify">
                                    <?= nl2br($one['description'] ) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <p>
                                    <i class="la la-bullhorn primary font-large-1"></i>
                                </p>
                                <h4>Artiste non trouvé</h4>

                                    <a href="/artiste" class="btn btn-bg-gradient-x-blue-cyan mt-2">
                                    <i class="ft-arrow-left"></i> Retour
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </section>

    </div>
</div>

<script>
    $('#menuArtistes').addClass('open')
    $('#menuListe').addClass('active')
</script>