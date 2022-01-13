<?php

class Profil extends Controller
{

    public function modification() {
        $name = htmlspecialchars(strip_tags($_POST['name']));
        $username = htmlspecialchars(strip_tags($_POST['username']));
        $img = $_POST['img'];

        $this->loadModel('Admins', [$name, $username, $img, null, null, $_SESSION['id']]);
        $this->loadDAO('AdminDAO', $this->Admins);

        $requet =  $this->AdminDAO->getAdminInfoByUsernameOrName();

        //var_dump($requet); die;
        if($requet && $requet['id'] == $_SESSION['id']) {
            $_SESSION['existe'] = true;
        }else{
            if ($this->AdminDAO->modifier()) {
                $_SESSION['update'] = true;
                $_SESSION['name'] = $name;
                $_SESSION['username'] = $username;
                $_SESSION['profil'] = $img;
            }else{
                $_SESSION['error'] = true;
            }
        }
        header('location:/profil');
    }


    public function index() {
        $this->render('index', 'page');
    }
}