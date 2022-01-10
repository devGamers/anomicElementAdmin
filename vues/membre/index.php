<div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Membre</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
                <div class="breadcrumb-wrapper mr-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            <a href="index.php?page=artiste">Liste des membres</a>
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
                            <form action="/membre/enregistrement" method="post">
                                <input type="hidden" name="action" id="action" value="0">
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <div class="position-relative has-icon-left">
                                                <input type="text" id="name" name="name" class="form-control" required
                                                       placeholder="Nom & Prénoms" autocomplete="off"
                                                />
                                                <div class="form-control-position">
                                                    <i class="ft-user"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <div class="position-relative has-icon-left">
                                                <input type="text" id="role" name="role" class="form-control" required
                                                       placeholder="Rôle" autocomplete="off" list="roles"
                                                />
                                                <div class="form-control-position">
                                                    <i class="ft-edit-3"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $add = [] ?>
                                        <dataList id="roles">
                                            <?php foreach ($all as $membre) : if(!in_array($membre['role'], $add)) : ?>
                                                <option><?= $membre['role'] ?></option>
                                            <?php array_push($add, $membre['role']); endif; endforeach; ?>
                                        </dataList>
                                    </div>

                                    <div class="col-md-2 col-12">
                                        <button class="btn btn-bg-gradient-x-blue-cyan" id="btnAction">
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

                            <div class="row">
                                <div class="col-12">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="resultat">
                <?php foreach ($all as $membre) : ?>
                    <div class="col-md-4 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?= $membre['name'] ?></h4>
                                <p class="card-text"><?= $membre['role'] ?></p>
                                <p class="card-text">
                                    <button type="button" class="btn btn-bg-gradient-x-red-pink" onclick="supprimer('<?= $membre['id'] ?>', '/membre')">
                                        <i class="la la-trash"></i> Supprimer
                                    </button>

                                    <button type="button" class="btn btn-bg-gradient-x-blue-green pull-right" onclick="update(<?=$membre['id']?>)">
                                        <i class="la la-pencil-square"></i> Modifier
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
    $('#meuMembres').addClass('active')

    resultat = document.getElementById('resultat').innerHTML

    const annuler = () => {
        document.getElementById('action').value = 0;
        document.getElementById('btnAction').innerHTML = '<i class="la la-save"></i> Ajouter';
    }

    const update = id => {
        let xhr = getXhr();
        xhr.onreadystatechange = function(){
            // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
            if(xhr.readyState === 4 && xhr.status === 200){
                let data = xhr.responseText.split('€')
                document.getElementById('name').value = data[0];
                document.getElementById('role').value = data[1];
                document.getElementById('action').value = id;
                document.getElementById('btnAction').innerHTML = '<i class="la la-pencil-square"></i> Modifier';
            }
        }

        xhr.open("POST","/membre/modifier", true);

        // ne pas oublier ça pour le post
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

        // ne pas oublier de poster les arguments
        xhr.send("id="+id);
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
            xhr.open("POST","/membre/recherche", true);

            // ne pas oublier ça pour le post
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

            // ne pas oublier de poster les arguments
            xhr.send("search="+search);
        }else{
            document.getElementById('resultat').innerHTML = resultat
        }
    }
</script>