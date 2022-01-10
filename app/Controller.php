<?php

abstract class Controller
{
    public static function formatNumber($number, $money = false) {
        if ($money) {
            return number_format($number, 0, ',', '.');
        }else{
            return $number <= 9 ? '0'.$number : $number;
        }
    }

    public function code($lenght)
    {
        $code = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ="), 0, $lenght);
        return $code;
    }

    public static function generationCle($Texte,$CleDEncryptage)
    {
        $CleDEncryptage = md5($CleDEncryptage);
        $Compteur=0;
        $VariableTemp = "";
        for ($Ctr=0;$Ctr<strlen($Texte);$Ctr++)
        {
            if ($Compteur==strlen($CleDEncryptage))
                $Compteur=0;
            $VariableTemp.= substr($Texte,$Ctr,1) ^ substr($CleDEncryptage,$Compteur,1);
            $Compteur++;
        }
        return $VariableTemp;
    }

    public static function crypte($Texte,$Cle)
    {
        srand((double)microtime()*1000000);
        $CleDEncryptage = md5(rand(0,32000) );
        $Compteur=0;
        $VariableTemp = "";
        for ($Ctr=0;$Ctr<strlen($Texte);$Ctr++)
        {
            if ($Compteur==strlen($CleDEncryptage))
                $Compteur=0;
            $VariableTemp.= substr($CleDEncryptage,$Compteur,1).(substr($Texte,$Ctr,1) ^ substr($CleDEncryptage,$Compteur,1) );
            $Compteur++;
        }
        return base64_encode(Controller::generationCle($VariableTemp,$Cle) );
    }

    public static function decrypte($Texte,$Cle)
    {
        $Texte = Controller::generationCle(base64_decode($Texte),$Cle);
        $VariableTemp = "";
        for ($Ctr=0;$Ctr<strlen($Texte);$Ctr++)
        {
            $md5 = substr($Texte,$Ctr,1);
            $Ctr++;
            $VariableTemp.= (substr($Texte,$Ctr,1) ^ $md5);
        }
        return $VariableTemp;
    }


    public function loadDAO($dao, $data){
        require_once(ROOT.'dao/'.$dao.'.php');
        $this->$dao = new $dao($data);
    }

    public function loadModel($model, $data = false){
        // On va chercher le fichier correspondant au modèle souhaité
        require_once(ROOT.'models/'.$model.'.php');

        // On crée une instance de ce modèle. Ainsi "Article" sera accessible par $this->Article
        $this->$model = new $model($data);
    }

    public function render($fichier, $layout ,$data = []){

        // Récupère les données et les extrait sous forme de variables
        extract($data);

        // On démarre le buffer de sortie
        ob_start();

        // On génère la vue
        require_once(ROOT.'vues/'.strtolower(get_class($this)).'/'.$fichier.'.php');

        // On stocke le contenu dans $content
        $content = ob_get_clean();

        // On fabrique le "template"
        require_once(ROOT.'vues/layout/'. $layout .'.php');
    }


}