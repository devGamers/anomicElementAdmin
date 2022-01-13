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


        $this->loadModel('Galeries');
        $this->loadDAO('GalerieDAO', $this->Galeries);
        $galeries = $this->GalerieDAO->readAll();

        $this->render('index', 'page', compact('membres', 'galeries', 'events', 'artistes'));
    }
}