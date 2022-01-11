<?php

class Artiste extends Controller
{

    public function detail() {
        $id = explode('|', $_GET['artiste']);
        $id = self::decrypte($id[1], $id[0]);
        $this->loadModel('Artistes', [$id, null, null, null, null, null]);
        $this->loadDAO('ArtisteDAO', $this->Artistes);
        $one = $this->ArtisteDAO->readOne();
        $liens = json_decode($one['liens'], true);
        $this->loadModel('Galeries', [null, null, $id, null]);
        $this->loadDAO('GalerieDAO', $this->Galeries);
        $galeries = $this->GalerieDAO->recherche($id.'€artiste');
        $this->render('detail', 'page', compact('one', 'liens', 'galeries'));
    }

    public function typeArtiste() {
        $type = $_POST['type'];
        $this->loadModel('Artistes', [null, null, null, null, null, $type]);
        $this->loadDAO('ArtisteDAO', $this->Artistes);
        $artistes = $this->ArtisteDAO->getArtisteByType();
        echo $artistes ? $this->affiche($artistes) : null;
    }

    public function recherche() {
        $search = htmlspecialchars(strip_tags($_POST['search']));
        $this->loadModel('Artistes');
        $this->loadDAO('ArtisteDAO', $this->Artistes);
        $artistes = $this->ArtisteDAO->recherche($search);
        echo $this->affiche($artistes);
    }

    public function affiche($listes) {
        $block = "";
        $code = $this->code(170);
        foreach ($listes as $liste) {
            $block .= '<div class="col-xl-6 col-lg-6 col-md-6 mb-50 ">';
            $block .= '    <div class="services-box">';
            $block .= '        <div class="services-img">';
            $block .= '             <img src="'. $liste['photo'] .'" class="img-fluid" alt="'. $liste['name']. '">';
            $block .= '        </div>';
            $block .= '        <div class="services-content">';
            $block .= '            <div class="card-title">';
            $block .= '                <h5>'. $liste['name']. '</h5>';
            $block .= '            </div>';
            $block .= '            <div class="card-text">';
            $block .= '                <p class="text-justify">'. substr($liste['description'], 0, 80) .'...</p>';
            $block .= '            </div>';
            $block .= '            <div>';
            $block .= '                 <a href="/artiste/detail&artiste='. $code . '|' . Controller::crypte($liste['id'], $code) .'" class="btn">Lire Plus</a>';
            $block .= '                 <span class="text-muted float-right">'. $liste['libelle'] .'</span>';
            $block .= '            </div>';
            $block .= '       </div>';
            $block .= '    </div>';
            $block .= '</div>';
        }
        return $block;
    }

    public function index() {
        $this->loadModel('Artistes');
        $this->loadDAO('ArtisteDAO', $this->Artistes);
        $artistes = $this->ArtisteDAO->readAll();

        $this->loadModel('TypeArtistes');
        $this->loadDAO('TypeArtisteDAO', $this->TypeArtistes);
        $types = $this->TypeArtisteDAO->readAll();

       $code = $this->code(170);

       $this->render('index', 'page', compact('code', 'artistes', 'types'));
    }

}