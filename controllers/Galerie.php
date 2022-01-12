<?php

class Galerie extends Controller
{
    public function index(){
        $this->loadModel('Galeries');
        $this->loadDAO('GalerieDAO', $this->Galeries);
        $galeries = $this->GalerieDAO->readAll();

        $this->loadModel('Artistes');
        $this->loadDAO('ArtisteDAO', $this->Artistes);
        $artiste = $this->ArtisteDAO;

        $this->loadModel('Evenements');
        $this->loadDAO('EvenementDAO', $this->Evenements);
        $event = $this->EvenementDAO;

        $code = $this->code(150);
        $this->render('index', 'page', compact('galeries', 'artiste', 'event', 'code'));
    }
}