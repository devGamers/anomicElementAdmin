<?php

class Galerie extends Controller
{

    public function recherche() {
        $search = $_POST['search'];
        $this->loadModel('Galeries');
        $this->loadDAO('GalerieDAO', $this->Galeries);
        $result = $this->GalerieDAO->recherche($search);
        $block = "";
        $code = $this->code(150);
        $this->loadModel('Evenements');
        $this->loadDAO('EvenementDAO', $this->Evenements);
        $event = $this->EvenementDAO;

        $this->loadModel('Artistes');
        $this->loadDAO('ArtisteDAO', $this->Artistes);
        $artiste = $this->ArtisteDAO;

        foreach ($result as $galerie) {

            $block .= '<div class="col-md-4 col-12">';
            $block .= '    <div class="card">';
            $block .= '     <img class="card-img-top img-fluid" style="max-height: 278px;" src="'.$galerie['image'] .'" alt="Image" />';
            $block .= '        <div class="card-body">';
            if($galerie['evenements_id']) {
                $event->setId($galerie['evenements_id']);
                $block .= '        <div title="Evènement" class="alert round bg-gradient-directional-cyan alert-icon-right" role="alert" style="padding: 0.5rem 1rem">';
                $block .= '             <span class="alert-icon"><i class="la la-bullhorn"></i></span>';
                $block .=              $event->readOne()['libelle'];
                $block .='          </div>';
            }

            if($galerie['artistes_id']) {
                $art = explode(',', $galerie['artistes_id']);
                foreach ($art as $artId) {
                    $artiste->setId($artId);
                    $block .='      <div title="Artistes" class="alert round bg-gradient-directional-blue-grey alert-icon-right" role="alert" style="padding: 0.5rem 1rem">';
                    $block .='            <span class="alert-icon"><i class="la la-user"></i></span>';
                    $block .=             $artiste->readOne()['name'];
                    $block .='       </div>';
                }
            }
            $block .= '            <p class="card-text">';
            $block .= '                 <button type="button" class="btn btn-bg-gradient-x-red-pink pull-right" onclick="supprimer("'. $code.'|'.Controller::crypte($galerie['id'], $code) .'", \'/galerie\')">';
            $block .= '                    <i class="la la-trash"></i> Supprimer';
            $block .= '                </button>';
            $block .= '            </p>';
            $block .= '        </div>';
            $block .= '    </div>';
            $block .= '</div>';
        }
        echo $block;
    }

    public function supprimer() {
        $id = explode('|', $_POST['id']);
        $id = Controller::decrypte($id[1], $id[0]);
        $this->loadModel('Galeries', [null, null, null, $_SESSION['id'], $id]);
        $this->loadDAO('GalerieDAO', $this->Galeries);

        if ($this->GalerieDAO->supprimer()) {
            $this->loadModel('Logs', [$_SESSION['name'], "Galerie", "Supression d'image", $_SESSION['id'], null, null, null, $id]);
            $this->loadDAO('LogDAO', $this->Logs);
            $this->LogDAO->ajouter();
            $_SESSION['supprimer'] = true;
            $_SESSION['texte'] = "Image supprimée";
            echo "success";
        }else{
            echo "error";
        }
    }

    public function enregistrement() {
        $event = (int) $_POST['event'] == 0 ? null : (int) $_POST['event'];
        $artistes = isset($_POST['artiste']) ? $_POST['artiste'] : null;
        if ($artistes != null) $artistes = implode(',', $artistes);
        $image = $_POST['img'];

        $this->loadModel('Galeries', [$image, $event, $artistes, $_SESSION['id'], null]);
        $this->loadDAO('GalerieDAO', $this->Galeries);
        $id = $this->GalerieDAO->ajouter();
        if ($id) {
            $this->loadModel('Logs', [$_SESSION['name'], "Galerie", "Ajout d'image à la galerie", $_SESSION['id'], null, null, null, $id]);
            $this->loadDAO('LogDAO', $this->Logs);
            $this->LogDAO->ajouter();
            $_SESSION['add'] = true;
            $_SESSION['texte'] = "Image ajoutée";
        }else{
            $_SESSION['error'] = true;
        }
        header('location:/galerie');
    }

    public function nouveau() {
        $this->loadModel('Evenements');
        $this->loadDAO('EvenementDAO', $this->Evenements);
        $events = $this->EvenementDAO->readAll();

        $this->loadModel('Artistes');
        $this->loadDAO('ArtisteDAO', $this->Artistes);
        $artistes = $this->ArtisteDAO->readAll();

        $this->render('nouveau', 'page', compact('events', 'artistes'));
    }

    public function index(){
        $this->loadModel('Evenements');
        $this->loadDAO('EvenementDAO', $this->Evenements);
        $event = $this->EvenementDAO;

        $this->loadModel('Artistes');
        $this->loadDAO('ArtisteDAO', $this->Artistes);
        $artiste = $this->ArtisteDAO;

        $this->loadModel('Galeries');
        $this->loadDAO('GalerieDAO', $this->Galeries);
        $all = $this->GalerieDAO->readAll();

        $code = $this->code(150);

        $this->render('index', 'page', compact('event', 'artiste', 'all', 'code'));
    }
}