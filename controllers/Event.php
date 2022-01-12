<?php

class Event extends Controller
{

    public function detail() {
        $id = explode('|', $_GET['event']);
        $id = self::decrypte($id[1], $id[0]);
        $this->loadModel('Evenements', [null, null, null, null, null, null, $id]);
        $this->loadDAO('EvenementDAO', $this->Evenements);
        $one = $this->EvenementDAO->readOne();
        $events = $this->EvenementDAO->readAll();
        $code = $this->code(170);
        $this->loadModel('Galeries', [null, $id, null, null]);
        $this->loadDAO('GalerieDAO', $this->Galeries);
        $galeries = $this->GalerieDAO->recherche($id.'€event');
        $this->render('detail', 'page', compact('one', 'galeries', 'events', 'code'));
    }

    public function recherche() {
        $search = htmlspecialchars(strip_tags($_POST['search']));
        $this->loadModel('Evenements');
        $this->loadDAO('EvenementDAO', $this->Evenements);
        $events = $this->EvenementDAO->recherche($search);
        $block = "";
        foreach ($events as $event) {
            $code = $this->code(160);
            $link = $code . '|' . self::crypte($event['id'], $code);
            $block .= '<div class="blog-wrapper mb-40">';
            $block .= '     <div class="blog-thumb">';
            $block .= '         <a href="/event/detail&event='. $link .'">';
            $block .= '             <img src="'. $event['image'] .'" alt="'. $event['libelle'] .'" />';
            $block .= '         </a>';
            $block .= '     </div>';
            $block .= '     <div class="meta-info">';
            $block .= '         <ul>';
            $block .= '             <li class="posts-time">';
            $block .=                   date('d/m/Y', strtotime($event['date'])) .' de '. date("H:i", strtotime($event['debut'])) .' à '. $event['fin'] ? date("H:i", strtotime($event['fin'])) : '-';
            $block .= '             </li>';
            $block .= '         </ul>';
            $block .= '     </div>';
            $block .= '     <div class="blog-content">';
            $block .= '         <h3 class="blog-title">';
            $block .= '             <a href="/event/detail&event='. $link .'">';
            $block .=                   $event['libelle'];
            $block .= '            </a>';
            $block .= '         </h3>';
            $block .= '         <p class="text-justify">'.substr($event['description'], 0, 160) .'...</p>';
            $block .= '     </div>';
            $block .= '     <div class="link-box">';
            $block .= '          <a href="/event/detail&event='. $link .'">Lire Plus</a>';
            $block .= '     </div>';
            $block .= '</div>';
        }
        echo $block;
    }

    public function index() {
        $this->loadModel('Evenements');
        $this->loadDAO('EvenementDAO', $this->Evenements);
        $events = $this->EvenementDAO->readAll();

        $code = $this->code(140);
        $this->render('index', 'page', compact('events', 'code'));
    }
}