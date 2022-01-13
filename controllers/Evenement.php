<?php

class Evenement extends Controller
{

    public function modification() {
        $titre = htmlspecialchars(strip_tags($_POST['titre']));
        $date = $_POST['date'];
        $debut = $_POST['debut'];
        $fin = $_POST['fin'];
        $description = htmlspecialchars(strip_tags($_POST['description']));
        $event = explode('|', $_POST['event']);
        $id = Controller::decrypte($event[1], $event[0]);
        $img = $_POST['image'];

        /*if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0) {
            $dossier = getcwd()."/public/images/evenements/";
            $info = pathinfo($_FILES['image']['name']); //récupération des infos de l'image
            $image = explode('.', $info['basename']); //séparation du nom et de l'extension
            $image[0] = str_replace($image[0], time(), $image[0]); //formatage du nom de l'image avec un timestamp
            $info['basename'] = $image[0] . '.' . $image[1]; //je reforme le nouveau nom avec l'extension de l'image
            pathinfo($_FILES['image']['name'])['basename'] = $info['basename']; //update du nom de l'image
            $fichier = $dossier . $info['basename']; // savegarde du chemin complet de l'image
            unlink($dossier.$img); //suppression de l'ancien image

            if(move_uploaded_file($_FILES['image']['tmp_name'], $fichier)) {
                $img = $info['basename']; //nouveau nom de l'image
            }
        }*/

        $this->loadModel('Evenements', [$titre, $description, $img, $date, $_SESSION['id'], $debut, $fin, $id]);
        $this->loadDAO('EvenementDAO', $this->Evenements);


        if ($this->EvenementDAO->modifier()) {
            $this->loadModel('Logs', [$_SESSION['name'], "Evènement", "Modification de l'évènement", $_SESSION['id'], $id]);
            $this->loadDAO('LogDAO', $this->Logs);
            $this->LogDAO->ajouter();
            $_SESSION['update'] = true;
            $_SESSION['texte'] = "Evènement modifié";
        }else{
            $_SESSION['error'] = true;
        }
        header('location:/evenement/detail&event='.$_POST['event']);

    }

    public function modifier() {
        $event = explode('|', $_GET['event']);
        $id = Controller::decrypte($event[1], $event[0]);
        $this->loadModel('Evenements', [null, null, null, null, null, null, null, $id]);
        $this->loadDAO('EvenementDAO', $this->Evenements);
        $one = $this->EvenementDAO->readOne();
        $code = $this->code(170);
        $id = $code . '|' . Controller::crypte($id, $code);
        $this->render('modifier', 'page', compact('one', 'id'));
    }

    public function supprimer() {
        $event = explode('|', $_POST['id']);
        $id = Controller::decrypte($event[1], $event[0]);
        $this->loadModel('Evenements', [null, null, null, null, null, null, null, $id]);
        $this->loadDAO('EvenementDAO', $this->Evenements);
        $one = $this->EvenementDAO->readOne();

        if ($this->EvenementDAO->supprimer()) {
            //unlink(getcwd() . "/public/images/evenements/" . $one['image']);
            $this->loadModel('Logs', [$_SESSION['name'], "Evènement", "Supression de l'évènement " . $one['libelle'], $_SESSION['id'], $id]);
            $this->loadDAO('LogDAO', $this->Logs);
            $this->LogDAO->ajouter();
            $_SESSION['supprimer'] = true;
            $_SESSION['texte'] = "Evènement supprimé";
            echo "success";
        }else{
            echo "error";
        }
    }

    public function detail() {
        ///var_dump($_GET); die;
        $event = explode('|', $_GET['event']);
        $id = Controller::decrypte($event[1], $event[0]);
        $this->loadModel('Evenements', [null, null, null, null, null, null, null, $id]);
        $this->loadDAO('EvenementDAO', $this->Evenements);
        $one = $this->EvenementDAO->readOne();
        $code = $this->code(160);
        $id = $code . '|' . Controller::crypte($id, $code);
        $this->render('detail', 'page', compact('one', 'id'));
    }

    public function recherche() {
        $search = htmlspecialchars(strip_tags($_POST['search']));
        $this->loadModel('Evenements');
        $this->loadDAO('EvenementDAO', $this->Evenements);
        $result = $this->EvenementDAO->recherche($search);
        $block = "";
        $code = $this->code(150);
        foreach ($result as $event) {
            $fin = $event['fin'] ? date("H:i", strtotime($event['fin'])) : '-';

            $block .= '<div class="col-md-4 col-12">';
            $block .= '    <div class="card">';
            $block .= '     <img class="card-img-top img-fluid" src="'.$event['image'] .'" alt="'.$event['libelle'] .'" />';
            $block .= '        <div class="card-body">';
            $block .= '            <h4 class="card-title">'. substr($event['libelle'], 0, 50) .'...</h4>';
            $block .= '            <p class="card-text">'. substr($event['description'], 0, 100) .'...</p>';
            $block .= '            <p class="card-text">';
            $block .= '                <small class="text-muted">'. date("Y/m/d", strtotime($event['date'])) .' de '. date("H:i", strtotime($event['debut'])) .' à '. $fin .'</small>';
            $block .= '                <a href="/evenement/detail&event='. $code .'|'. self::crypte($event['id'], $code) .'" class="btn btn-bg-gradient-x-blue-green pull-right"><i class="ft-eye"></i> Afficher</a>';
            $block .= '            </p>';
            $block .= '        </div>';
            $block .= '    </div>';
            $block .= '</div>';
        }
        echo $block;
    }


    public function enregistrement() {
        $titre = htmlspecialchars(strip_tags($_POST['titre']));
        $date = $_POST['date'];
        $debut = $_POST['debut'];
        $fin = $_POST['fin'];
        $description = htmlspecialchars(strip_tags($_POST['description']));

        /*
         * Ce code fait l'enregistrement de l'image de l'évènement dans le dossier public
         * if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0) {
            $dossier = getcwd() . "/public/images/evenements/"; //chemin vers le dossier de stockage des events
            $info = pathinfo($_FILES['image']['name']); //récupération des infos de l'image
            $image = explode('.', $info['basename']); //séparation du nom et de l'extension
            $image[0] = str_replace($image[0], time(), $image[0]); //formatage du nom de l'image avec un timestamp
            $info['basename'] = $image[0] . '.' . $image[1]; //je reforme le nouveau nom avec l'extension de l'image
            pathinfo($_FILES['image']['name'])['basename'] = $info['basename']; //update du nom de l'image
            $fichier = $dossier . $info['basename']; // savegarde du chemin complet de l'image

            if(move_uploaded_file($_FILES['image']['tmp_name'], $fichier)) { //si image mi dans le dossier
                $image = $info['basename']; //nouveau nom de l'image
                $this->loadModel('Evenements', [$titre, $description, $image, $date, $_SESSION['id'], $debut, $fin]);
                $this->loadDAO('EvenementDAO', $this->Evenements);

                $eventId = $this->EvenementDAO->ajouter();
                if ($eventId) {
                    $this->loadModel('Logs', [$_SESSION['name'], "Evènement", "Création de l'évènement", $_SESSION['id'], $eventId]);
                    $this->loadDAO('LogDAO', $this->Logs);
                    $this->LogDAO->ajouter();
                    $_SESSION['add'] = true;
                    $_SESSION['texte'] = "Evènement ajouté";
                }else{
                    $_SESSION['error'] = true;
                }
                header('location:/evenement');
            }else{
                $_SESSION['echecMoveImage'] = true;
                $this->nouveau();
            }
        }else{
            $_SESSION['echecInfoImage'] = true;
            $this->nouveau();
        }*/

        //on enregistre les images encodé dans la base64 donc sous forme de chaine

        $this->loadModel('Evenements', [$titre, $description, $_POST['img'], $date, $_SESSION['id'], $debut, $fin, null]);
        $this->loadDAO('EvenementDAO', $this->Evenements);

        $eventId = $this->EvenementDAO->ajouter();
        if ($eventId) {
            $this->loadModel('Logs', [$_SESSION['name'], "Evènement", "Création de l'évènement", $_SESSION['id'], $eventId]);
            $this->loadDAO('LogDAO', $this->Logs);
            $this->LogDAO->ajouter();
            $_SESSION['add'] = true;
            $_SESSION['texte'] = "Evènement ajouté";
        }else{
            $_SESSION['error'] = true;
        }
        header('location:/evenement');
    }

    public function nouveau() {
        $this->render('nouveau', 'page');
    }

    public function index(){
        $this->loadModel('Evenements');
        $this->loadDAO('EvenementDAO', $this->Evenements);
        $all = $this->EvenementDAO->readAll();
        $code = $this->code(150);
        $this->render('index', 'page', compact('all', 'code'));
    }
}