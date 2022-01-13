<?php

class Typeartiste extends Controller
{

    public function modifier() {
        $this->loadModel('TypeArtistes', [null, null, $_POST['id']]);
        $this->loadDAO('TypeArtisteDAO', $this->TypeArtistes);
        $one = $this->TypeArtisteDAO->readOne();
        echo $one['libelle'];
    }

    public function supprimer() {
        $this->loadModel('TypeArtistes', [null, null, $_POST['id']]);
        $this->loadDAO('TypeArtisteDAO', $this->TypeArtistes);
        $one = $this->TypeArtisteDAO->readOne();

        if ($this->TypeArtisteDAO->supprimer()) {
            $this->loadModel('Logs', [$_SESSION['name'], "Type Artiste", "Suppression du type d'artiste " . $one['libelle'], $_SESSION['id'], null, $one['id']]);
            $this->loadDAO('LogDAO', $this->Logs);
            $this->LogDAO->ajouter();
            $_SESSION['supprimer'] = true;
            $_SESSION['texte'] = "Type d'artiste supprimé";
            echo "success";
        }else{
            echo "error";
        }
    }

    public function recherche() {
        $search = htmlspecialchars(strip_tags($_POST['search']));
        $this->loadModel('TypeArtistes');
        $this->loadDAO('TypeArtisteDAO', $this->TypeArtistes);
        $result = $this->TypeArtisteDAO->recherche($search);
        $block = "";

        foreach ($result as $item) {
            $this->loadModel('Artistes', [null, null, null, null, null, $item['id']]);
            $this->loadDAO('ArtisteDAO', $this->Artistes);

            $block .= '<div class="col-md-4 col-12 alert round bg-gradient-directional-cyan alert-icon-left mb-2" role="alert">';
            $block .= '    <span class="alert-icon cursor-pointer" onclick="update('. $item['id'] .')"><i class="la la-pencil-square"></i></span>';
            if($this->ArtisteDAO->numberOfArtisteByType()['nbr'] == 0) {
                $block .= '<button type="button" class="close" aria-label="Close" onclick="supprimer('. $item['id'] . ', \'/typeartiste\')">';
                $block .= '    <span aria-hidden="true">&times;</span>';
                $block .= '</button>';
            }
            $block .= $item['libelle'];
            $block .= '<span class="badge badge badge-pill badge-dark float-right mr-2">';
            $block .= Controller::formatNumber($this->ArtisteDAO->numberOfArtisteByType()['nbr']) . ' Artiste(s)';
            $block .= '</span></div>';
        }
        echo $block;
    }

    public function action() {
        $action = $_POST['action'];
        $libelle = htmlspecialchars(strip_tags(trim($_POST['libelle'])));

        $this->loadModel('TypeArtistes', [$libelle, $_SESSION['id'], $action]);
        $this->loadDAO('TypeArtisteDAO', $this->TypeArtistes);

        $existe = $this->TypeArtisteDAO->readByLib();

        if ($action == "0") { //ajout
            if ($existe) {
                $_SESSION['existe'] = true;
            }else{
                $idType = $this->TypeArtisteDAO->ajouter();
                if ($idType) {
                    $this->loadModel('Logs', [$_SESSION['name'], "Type Artiste", "Création du type d'artiste", $_SESSION['id'], null, $idType]);
                    $this->loadDAO('LogDAO', $this->Logs);
                    $this->LogDAO->ajouter();
                    $_SESSION['add'] = true;
                    $_SESSION['texte'] = "Type artiste ajouté.";
                }else{
                    $_SESSION['error'] = true;
                }
            }
        }else{ //update
            if($existe && $existe['id'] == $action) {
                $_SESSION['existe'] = true;
            }else{
                if ($this->TypeArtisteDAO->modifier()) {
                    $this->loadModel('Logs', [$_SESSION['name'], "Type Artiste", "Modification du type d'artiste " . $existe['libelle'] . " en " . $libelle, $_SESSION['id'], null, $action]);
                    $this->loadDAO('LogDAO', $this->Logs);
                    $this->LogDAO->ajouter();
                    $_SESSION['update'] = true;
                    $_SESSION['texte'] = "Type d'artiste modifié";
                }else{
                    $_SESSION['error'] = true;
                }
            }
        }
        header('location:/typeartiste');
    }

    public function index() {
        $this->loadModel('TypeArtistes');
        $this->loadDAO('TypeArtisteDAO', $this->TypeArtistes);
        $all = $this->TypeArtisteDAO->readAll();
        $this->loadModel('Artistes');
        $this->loadDAO('ArtisteDAO', $this->Artistes);
        $artiste = $this->ArtisteDAO;
        $this->render('index', 'page', compact('all', 'artiste'));
    }
}