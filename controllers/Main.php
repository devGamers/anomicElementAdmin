<?php

class Main extends Controller
{
    public function index(){
        $this->loadModel('Evenements');
        $this->loadDAO('EvenementDAO', $this->Evenements);
        $events = $this->EvenementDAO->readAll();

        $this->loadModel('Artistes');
        $this->loadDAO('ArtisteDAO', $this->Artistes);
        $artistes = $this->ArtisteDAO->readAll();

        $this->loadModel('Membres');
        $this->loadDAO('MembreDAO', $this->Membres);
        $membres = $this->MembreDAO->readAll();

        $code = $this->code(150);
        $this->render('index', 'page', compact('events', 'artistes', 'membres', 'code'));
    }
}