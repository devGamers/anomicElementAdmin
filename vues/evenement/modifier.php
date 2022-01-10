<div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Evènements</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
                <div class="breadcrumb-wrapper mr-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/evenement">Liste des évènements</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="/evenement/detail&event=<?= $id ?>">
                                <?= substr($one['libelle'], 0, 20) ?>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Modifier</li>
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
                            <form action="/evenement/modification" method="post" class="form" enctype="multipart/form-data">
                                <input type="hidden" name="event" value="<?= $id ?>">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-8 col-12">
                                            <div class="form-group">
                                                <label for="titre">Titre <span class="text-danger">*</span></label>
                                                <input type="text" id="titre" name="titre" class="form-control" required value="<?= $one['libelle'] ?>"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="date">Date <span class="text-danger">*</span></label>
                                                <input type="date" id="date" name="date" class="form-control" required value="<?= $one['date'] ?>"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="desc">Description <span class="text-danger">*</span></label>
                                                <textarea class="form-control" name="description" id="desc" rows="5" required><?= $one['description'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label for="debut">Démarrage <span class="text-danger">*</span></label>
                                                <input type="time" id="debut" name="debut" class="form-control" required value="<?= $one['debut'] ?>"/>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label for="fin">Fin</label>
                                                <input type="time" id="fin" name="fin" class="form-control" value="<?= $one['fin'] ?>"/>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-12">
                                            <label for="imag">Image</label>
                                            <div class="form-group custom-file">
                                                <input type="file" class="custom-file-input form-control" id="image" name="image" accept="image/*">
                                                <label class="custom-file-label" for="image">Choisir</label>
                                            </div>
                                        </div>
                                        <input type="hidden" name="image" value="<?= $one['image'] ?>" id="img"/>
                                        <div class="col-md-3 col-12">
                                            <img src="<?= $one['image'] ?>" id="previewing" alt="Aperçu" class="img-thumbnail img-fluid">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions right">
                                    <button type="reset" class="btn btn-bg-gradient-x-orange-yellow  mr-1">
                                        <i class="ft-x"></i> Annuler
                                    </button>
                                    <button type="submit" class="btn btn-bg-gradient-x-blue-cyan">
                                        <i class="la la-pencil-square"></i> Modifier
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>

<script>
    $('#menuEvents').addClass('active')

    <?php if(isset($_SESSION['echecInfoImage']) && $_SESSION['echecInfoImage']) : ?>
        swal({
            type: 'error',
            title: 'Anomic Elements',
            text: "Impossible d'obtenir les informations de l'image. Veuillez en changer. Merci",
        });
    <?php $_SESSION['echecInfoImage'] = false; unset($_SESSION['echecInfoImage']); endif ?>

    <?php if(isset($_SESSION['echecMoveImage']) && $_SESSION['echecMoveImage']) : ?>
        swal({
            type: 'error',
            title: 'Anomic Elements',
            text: "Echec d'enregistrement de l'image.",
        });
    <?php $_SESSION['echecMoveImage'] = false; unset($_SESSION['echecMoveImage']); endif ?>

</script>