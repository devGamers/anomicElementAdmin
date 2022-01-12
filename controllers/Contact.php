<?php

class Contact extends Controller
{
    public function index(){
        $this->loadModel('Membres');
        $this->loadDAO('MembreDAO', $this->Membres);
        $membres = $this->MembreDAO->readAll();

        $this->render('index', 'page', compact('membres'));
    }
}