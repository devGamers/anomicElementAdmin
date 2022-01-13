<div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Profil</h3>
        </div>

    </div>


    <div class="content-body">
        <section id="drag-area">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="/profil/modification" method="post" class="form" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name">Nom & Prénom <span class="text-danger">*</span></label>
                                                <input type="text" id="name" name="name" class="form-control" required value="<?= $_SESSION['name'] ?>"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="username">Nom d'utilisateur <span class="text-danger">*</span></label>
                                                <input type="text" id="username" name="username" class="form-control" required value="<?= $_SESSION['username'] ?>"/>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-12">
                                            <label for="imag">Image <span class="text-danger">*</span></label>
                                            <div class="form-group custom-file">
                                                <input type="file" class="custom-file-input form-control" id="image" name="image" accept="image/*">
                                                <label class="custom-file-label" for="image">Choisir</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-12">
                                            <input type="hidden" name="img" id="img" value="<?= $_SESSION['profil'] ?>"/>
                                            <img src="<?= $_SESSION['profil'] ?>" id="previewing" alt="Aperçu" class="img-thumbnail img-fluid">
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