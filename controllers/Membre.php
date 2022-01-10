<?php

class Membre extends Controller
{

    public function modifier() {
        $this->loadModel('Membres', [null, null, $_SESSION['id'], $_POST['id']]);
        $this->loadDAO('MembreDAO', $this->Membres);
        $one = $this->MembreDAO->readOne();
        echo $one['name'] . '€' . $one['role'];
    }

    public function recherche() {
        $search = htmlspecialchars(strip_tags($_POST['search']));
        $this->loadModel('Membres');
        $this->loadDAO('MembreDAO', $this->Membres);
        $result = $this->MembreDAO->recherche($search);
        $block = "";
        foreach ($result as $membre) {

            $block .= '<div class="col-md-4 col-12">';
            $block .= '    <div class="card">';
            $block .= '        <div class="card-body">';
            $block .= '            <h4 class="card-title">'. $membre['name'] .'</h4>';
            $block .= '            <p class="card-text">'. $membre['role'] .'</p>';
            $block .= '            <p class="card-text">';
            $block .= '                 <button type="button" class="btn btn-bg-gradient-x-red-pink" onclick="supprimer('.$membre['id'].', \'/membre\')">';
            $block .= '                    <i class="la la-trash"></i> Supprimer';
            $block .= '                 </button>';
            $block .= '                 <button type="button" class="btn btn-bg-gradient-x-blue-green pull-right" onclick="update('.$membre['id'] .')">';
            $block .= '                     <i class="la la-pencil-square"></i> Modifier';
            $block .= '                 </button>';
            $block .= '            </p>';
            $block .= '        </div>';
            $block .= '    </div>';
            $block .= '</div>';
        }
        echo $block;
    }


    public function supprimer() {
        $this->loadModel('Membres', [null, null, $_SESSION['id'], $_POST['id']]);
        $this->loadDAO('MembreDAO', $this->Membres);
        $one = $this->MembreDAO->readOne();

        if ($this->MembreDAO->supprimer()) {
            $this->loadModel('Logs', [$_SESSION['name'], "Membre", "Suppression du membre " . $one['name'], $_SESSION['id'], null, null, null, null, $one['id']]);
            $this->loadDAO('LogDAO', $this->Logs);
            $this->LogDAO->ajouter();
            $_SESSION['supprimer'] = true;
            $_SESSION['texte'] = "Membre supprimé";
            echo "success";
        }else{
            echo "error";
        }
    }

    public function enregistrement() {
        $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
        $role = htmlspecialchars(strip_tags(trim($_POST['role'])));
        $action = $_POST['action'];

        $this->loadModel('Membres', [$name, $role, $_SESSION['id'], $action]);
        $this->loadDAO('MembreDAO', $this->Membres);

        $existe = $this->MembreDAO->existeByName();

        if ($action == "0") { //ajout
            if ($existe) {
                $_SESSION['existe'] = true;
            }else{
                $id = $this->MembreDAO->ajouter();
                if ($id) {
                    $this->loadModel('Logs', [$_SESSION['name'], "Membre", "Création du nouveau membre", $_SESSION['id'], null, null, null, null, $id]);
                    $this->loadDAO('LogDAO', $this->Logs);
                    $this->LogDAO->ajouter();
                    $_SESSION['add'] = true;
                    $_SESSION['texte'] = "Membre ajouté.";
                }else{
                    $_SESSION['error'] = true;
                }
            }
        }else{ //update
            if($existe && $existe['id'] == $action) {
                $_SESSION['existe'] = true;
            }else{
                if ($this->MembreDAO->modifier()) {
                    $this->loadModel('Logs', [$_SESSION['name'], "Membre", "Modification du membre " . $existe['name'], $_SESSION['id'], null, null, null, null, $action]);
                    $this->loadDAO('LogDAO', $this->Logs);
                    $this->LogDAO->ajouter();
                    $_SESSION['update'] = true;
                    $_SESSION['texte'] = "Membre modifié";
                }else{
                    $_SESSION['error'] = true;
                }
            }
        }
        header('location:/membre');
    }

    public function index() {
        $this->loadModel('Membres');
        $this->loadDAO('MembreDAO', $this->Membres);
        $all = $this->MembreDAO->readAll();
        $code = $this->code(150);
        $this->render('index', 'page', compact('all', 'code'));
    }
}