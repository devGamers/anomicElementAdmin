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
                        <li class="breadcrumb-item">
                            <a href="/galerie">Liste des images de la galerie</a>
                        </li>
                        <li class="breadcrumb-item active">Nouveau</li>
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
                            <form action="/galerie/enregistrement" method="post" class="form" enctype="multipart/form-data">
                                <div class="form-body">

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="event">Evènement </label>
                                                <select class="select2 form-control" id="event" name="event">
                                                    <option value=""></option>
                                                    <?php foreach ($events as $event) : ?>
                                                        <option value="<?= $event['id'] ?>"><?= $event['libelle'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8 col-12">
                                            <div class="form-group">
                                                <label for="type">Artistes <span class="text-italic text-sm-right font-size-small text-info">(Vous pouvez choisir plusieurs artistes)</span> </label>
                                                <select class="select2 form-control" id="type" name="artiste[]" multiple>
                                                    <option value=""></option>
                                                    <?php foreach ($artistes as $artiste) : ?>
                                                        <option value="<?= $artiste['id'] ?>"><?= $artiste['name'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <label for="imag">Image <span class="text-danger">*</span></label>
                                            <div class="form-group custom-file">
                                                <input type="file" required class="custom-file-input form-control" id="image" name="image" accept="image/*">
                                                <label class="custom-file-label" for="image">Choisir</label>
                                            </div>
                                            <input type="hidden" name="img" id="img"/>
                                            <img src="" id="previewing" alt="Aperçu" class="img-thumbnail img-fluid">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions right">
                                    <button type="reset" class="btn btn-bg-gradient-x-orange-yellow  mr-1">
                                        <i class="ft-x"></i> Annuler
                                    </button>
                                    <button type="submit" class="btn btn-bg-gradient-x-blue-cyan">
                                        <i class="la la-save"></i> Ajouter
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
    $('#menuGaleries').addClass('active')
</script>