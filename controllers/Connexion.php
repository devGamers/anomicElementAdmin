<?php

require_once 'dao/AdminDAO.php';

class Connexion extends Controller
{

    public function deconnexion() {
        session_destroy();
        header('location:/');
    }

    public function login() {
        $username = htmlspecialchars(strip_tags($_POST['username']));
        $password = htmlspecialchars(strip_tags($_POST['password']));
        $password = md5(sha1($password));
        $this->loadModel('Admins', ["", $username, "", ""]);
        $this->loadDAO('AdminDAO', $this->Admins);
        $requet =  $this->AdminDAO->getAdminInfoByUsernamePassword($password);

        if($requet) {
            $this->loadModel('Logs', [$requet['name'], "Connexion", "Nouvelle connexion", $requet['id']]);
            $this->loadDAO('LogDAO', $this->Logs);
            if ($this->LogDAO->ajouter()) {
                $_SESSION['connected'] = true;
                $_SESSION['welcome'] = true;
                $_SESSION['name'] = $requet['name'];
                $_SESSION['username'] = $requet['username'];
                $_SESSION['profil'] = $requet['profil'];
                $_SESSION['showLogs'] = $requet['showLogs'];
                $_SESSION['manageUser'] = $requet['manageUser'];
                $_SESSION['id'] = $requet['id'];
                header('location:index.php');
            }else{
                $_SESSION['error'] = true;
                $this->index();
            }
        }else{
            $_SESSION['echec'] = true;
            $this->index();
        }
    }

    public function index(){
        $this->render('index', 'auth');
    }
}