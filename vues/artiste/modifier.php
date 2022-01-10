<div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Artistes</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
                <div class="breadcrumb-wrapper mr-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/artiste">Liste des artistes</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="/evenement/detail&event=<?= $id ?>">
                                <?= $one['name'] ?>
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
                            <form action="/artiste/modification" method="post" class="form" enctype="multipart/form-data">
                                <input type="hidden" name="artiste" value="<?= $id ?>">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-8 col-12">
                                            <div class="form-group">
                                                <label for="name">Nom & Prénoms <span class="text-danger">*</span></label>
                                                <input type="text" id="name" value="<?= $one['name'] ?>" name="name" class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="type">Type d'artiste <span class="text-danger">*</span></label>
                                                <select class="select2 form-control" id="type" name="typeArtiste" required>
                                                    <option value=""></option>
                                                    <?php foreach ($types as $type) : ?>
                                                        <option selected="<?= $one['type_artistes_id'] == $type['id'] ?>" value="<?= $type['id'] ?>"><?= $type['libelle'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
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
                                        <div class="col-md-4 col-12">
                                            <label for="imag">Photo</label>
                                            <div class="form-group custom-file">
                                                <input type="file" class="custom-file-input form-control" id="image" name="image" accept="image/*">
                                                <label class="custom-file-label" for="image">Choisir</label>
                                            </div>
                                            <input type="hidden" name="img" id="img" value="<?= $one['photo'] ?>" />
                                            <img src="<?= $one['photo'] ?>" id="previewing" alt="Aperçu" class="img-thumbnail img-fluid">
                                        </div>

                                        <div class="col-md-8 col-12">
                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="nbrLien">Nombre de lien social</label>
                                                        <input type="number" min="1" id="nbrLien" class="form-control"/>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-12">
                                                    <br>
                                                    <button type="button" class="btn btn-bg-gradient-x-blue-green" onclick="ajoutLien()">
                                                        <i class="la la-external-link"></i> Générer
                                                    </button>
                                                </div>

                                                <div class="col-12">
                                                    <?php if($liens): foreach ($liens as $key => $lien) : ?>
                                                        <div class="row">
                                                            <div class="col-md-4 col-12">
                                                                <div class="form-group">
                                                                    <label for="titre">Réseau <span class="text-danger">*</span></label>
                                                                    <input type="text" id="titre" name="reseau[]" value="<?= $key ?>" class="form-control" required="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8 col-12">
                                                                <div class="form-group">
                                                                    <label for="titre">Lien <span class="text-danger">*</span></label>
                                                                    <input type="text" id="titre" name="lien[]" value="<?= $lien ?>" class="form-control" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; endif; ?>
                                                    <div id="lien"></div>
                                                </div>
                                            </div>
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
    $('#menuArtistes').addClass('open')
    $('#menuListe').addClass('active')

    const ajoutLien = () => {
        let nbrLien = document.getElementById('nbrLien').value
        if (nbrLien) {
            afficher(nbrLien)
        }else{
            toastr.warning(
                "Renseignez le nombre de lien social que possède cet artiste.",
                "Anomic Elements",
                {
                    positionClass: "toast-bottom-left",
                    containerId: "toast-bottom-left",
                    showMethod: "slideDown",
                    hideMethod: "slideUp",
                    timeOut: 2e3,
                }
            )
        }
    }

    const afficher = (nbr) => {
        let lien = ''
        for(let i = 1; i<=nbr; i++) {
            lien += '<div class="row">'
            lien += '       <div class="col-md-4 col-12">'
            lien += '           <div class="form-group">'
            lien += '               <label for="titre">Réseau <span class="text-danger">*</span></label>'
            lien += '               <input type="text" id="titre" name="reseau[]" class="form-control" required/>'
            lien += '           </div>'
            lien += '       </div>'
            lien += '       <div class="col-md-8 col-12">'
            lien += '           <div class="form-group">'
            lien += '               <label for="titre">Lien <span class="text-danger">*</span></label>'
            lien += '               <input type="text" id="titre" name="lien[]" class="form-control" required/>'
            lien += '           </div>'
            lien += '       </div>'
            lien += '</div>'
        }
        document.getElementById('lien').innerHTML = lien
    }

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