<?php

class Artiste extends Controller
{
    public function modification() {
        $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
        $typeArtiste = $_POST['typeArtiste'];
        $description = htmlspecialchars(strip_tags($_POST['description']));
        $img = $_POST['img'];
        $liens = isset($_POST['lien']) ? $_POST['lien'] : null;
        $reseaux = isset($_POST['reseau']) ? $_POST['reseau'] : null;
        $lienJson = null;
        if($liens != null) {
            $lien = array();

            for ($i=0; $i<count($liens); $i++) {
                $lien[$reseaux[$i]] = $liens[$i];
            }
            $lienJson = json_encode($lien);
        }

        $artiste = explode('|', $_POST['artiste']);
        $id = Controller::decrypte($artiste[1], $artiste[0]);

        $this->loadModel('Artistes', [$id, $name, $img, $description, $lienJson, $typeArtiste, $_SESSION['id']]);
        $this->loadDAO('ArtisteDAO', $this->Artistes);
        $existe = $this->ArtisteDAO->existeByName();

        if ($existe && $existe['id'] != $id) {
            $_SESSION['existe'] = true;
            header('location:/artiste/modifier&artiste='.$_POST['artiste']);
        }else{
            if ($this->ArtisteDAO->modifier()) {
                $this->loadModel('Logs', [$_SESSION['name'], "Artiste", "Modification de l'artiste", $_SESSION['id'], null, null, $id]);
                $this->loadDAO('LogDAO', $this->Logs);
                $this->LogDAO->ajouter();
                $_SESSION['update'] = true;
                $_SESSION['texte'] = "Artiste modifié";
            }else{
                $_SESSION['error'] = true;
            }
            header('location:/artiste/detail&artiste='.$_POST['artiste']);
        }
    }

    public function modifier() {
        $this->loadModel('TypeArtistes');
        $this->loadDAO('TypeArtisteDAO', $this->TypeArtistes);
        $types = $this->TypeArtisteDAO->readAll();

        $artiste = explode('|', $_GET['artiste']);
        $id = Controller::decrypte($artiste[1], $artiste[0]);
        $this->loadModel('Artistes', [$id, null, null, null, null, null, null]);
        $this->loadDAO('ArtisteDAO', $this->Artistes);
        $one = $this->ArtisteDAO->readOne();

        $code = $this->code(180);
        $id = $code . '|' . Controller::crypte($id, $code);

        $liens = json_decode($one['liens'], true);

        $this->render('modifier', 'page', compact('one', 'id', 'types', 'liens'));
    }
    
    public function supprimer() {
        $artiste = explode('|', $_POST['id']);
        $id = Controller::decrypte($artiste[1], $artiste[0]);
        $this->loadModel('Artistes', [$id, null, null, null, null, null, null]);
        $this->loadDAO('ArtisteDAO', $this->Artistes);
        $one = $this->ArtisteDAO->readOne();

        if ($this->ArtisteDAO->supprimer()) {
            $this->loadModel('Logs', [$_SESSION['name'], "Artiste", "Supression de l'artiste " . $one['name'], $_SESSION['id'], null, null, $id]);
            $this->loadDAO('LogDAO', $this->Logs);
            $this->LogDAO->ajouter();
            $_SESSION['supprimer'] = true;
            $_SESSION['texte'] = "Artiste supprimé";
            echo "success";
        }else{
            echo "error";
        }
    }

    public function detail() {
        $artiste = explode('|', $_GET['artiste']);
        $id = Controller::decrypte($artiste[1], $artiste[0]);
        $this->loadModel('Artistes', [$id, null, null, null, null, null, null]);
        $this->loadDAO('ArtisteDAO', $this->Artistes);
        $one = $this->ArtisteDAO->readOne();
        $code = $this->code(160);
        $id = $code . '|' . Controller::crypte($id, $code);

        $liens = json_decode($one['liens'], true);

        $this->render('detail', 'page', compact('one', 'id', 'liens'));
    }

    public function recherche() {
        $search = htmlspecialchars(strip_tags(trim($_POST['search'])));
        $this->loadModel('Artistes');
        $this->loadDAO('ArtisteDAO', $this->Artistes);
        $result = $this->ArtisteDAO->recherche($search);
        $block = "";
        $code = $this->code(150);
        foreach ($result as $artiste) {
            $block .= '<div class="col-md-4 col-12">';
            $block .= '    <div class="card">';
            $block .= '     <img class="card-img-top img-fluid" src="'.$artiste['photo'] .'" alt="'.$artiste['name'] .'" />';
            $block .= '        <div class="card-body">';
            $block .= '            <h4 class="card-title">'. $artiste['name'] .'</h4>';
            $block .= '            <p class="card-text">'. substr($artiste['description'], 0, 100) .'...</p>';
            $block .= '            <p class="card-text">';
            $block .= '                <small class="text-muted">'. $artiste['libelle'] .'</small>';
            $block .= '                <a href="/artiste/detail&artiste='. $code .'|'. self::crypte($artiste['id'], $code) .'" class="btn btn-bg-gradient-x-blue-green pull-right"><i class="ft-eye"></i> Afficher</a>';
            $block .= '            </p>';
            $block .= '        </div>';
            $block .= '    </div>';
            $block .= '</div>';
        }
        echo $block;
    }

    public function enregistrement() {
        $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
        $typeArtiste = $_POST['typeArtiste'];
        $description = htmlspecialchars(strip_tags($_POST['description']));
        $img = $_POST['img'];
        $liens = isset($_POST['lien']) ? $_POST['lien'] : null;
        $reseaux = isset($_POST['reseau']) ? $_POST['reseau'] : null;
        $lienJson = null;
        if($liens != null) {
            $lien = array();

            for ($i=0; $i<count($liens); $i++) {
                $lien[$reseaux[$i]] = $liens[$i];
            }
            $lienJson = json_encode($lien);
        }

        $this->loadModel('Artistes', [null, $name, $img, $description, $lienJson, $typeArtiste, $_SESSION['id']]);
        $this->loadDAO('ArtisteDAO', $this->Artistes);
        $existe = $this->ArtisteDAO->existeByName();

        if ($existe) {
            $_SESSION['existe'] = true;
            $this->nouveau();
        }else{

            $id = $this->ArtisteDAO->ajouter();
            if($id) {
                $this->loadModel('Logs', [$_SESSION['name'], "Artiste", "Création d'un artiste", $_SESSION['id'], null, null, $id]);
                $this->loadDAO('LogDAO', $this->Logs);
                $this->LogDAO->ajouter();
                $_SESSION['add'] = true;
                $_SESSION['texte'] = "Artiste ajouté";
            }else{
                $_SESSION['error'] = true;
            }
            header('location:/artiste');
        }
    }

    public function nouveau() {
        $this->loadModel('TypeArtistes');
        $this->loadDAO('TypeArtisteDAO', $this->TypeArtistes);
        $types = $this->TypeArtisteDAO->readAll();

        $this->render('nouveau', 'page', compact('types'));
    }

    public function index(){
        $this->loadModel('Artistes');
        $this->loadDAO('ArtisteDAO', $this->Artistes);
        $all = $this->ArtisteDAO->readAll();
        $code = $this->code(150);
        $this->render('index', 'page', compact('all', 'code'));
    }
}