<?php

    if (!isset($_SESSION)) {
        session_start();
    }

    define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

    require_once(ROOT.'app/Controller.php');
    require_once(ROOT.'app/Model.php');
    require_once(ROOT.'dao/DAO.php');
    require_once(ROOT.'dao/DAOFactory.php');

    // On sépare les paramètres et on les met dans le tableau $params

    if (isset($_GET['page'])) {
        $params = explode('/', $_GET['page']);

        // Si au moins 1 paramètre existe
        if ($params[0] != "") {

            // On sauvegarde le 1er paramètre dans $controller en mettant sa 1ère lettre en majuscule
            $controller = ucfirst($params[0]);

            // On sauvegarde le 2ème paramètre dans $action si il existe, sinon index
            $action = isset($params[1]) ? $params[1] : 'index';

            require_once(ROOT.'controllers/'.$controller.'.php'); // On appelle le contrôleur
            $controller = new $controller(); // On instancie le contrôleur

            if(method_exists($controller, $action)){
                //$controller->$action(); // On appelle la méthode si elle existe

                // On supprime les 2 premiers paramètres
                unset($params[0]);
                unset($params[1]);
                call_user_func_array([$controller,$action], $params);
            }else{
                // On envoie le code réponse 404
                http_response_code(404);
                echo "La page recherchée n'existe pas";
            }

        } else {
            // Ici aucun paramètre n'est défini
            require_once(ROOT.'controllers/Main.php');
            $controller = new Main(); // On instancie le contrôleur
            $controller->index();
        }
    }else{

        if (isset($_SESSION['connected'])) {
            // Ici aucun paramètre n'est défini
            require_once(ROOT.'controllers/Main.php');
            $controller = new Main(); // On instancie le contrôleur
            $controller->index();
        }else{
            require_once(ROOT.'controllers/Connexion.php');
            $controller = new Connexion(); // On instancie le contrôleur
            $controller->index();
        }
    }


https://ci3.googleusercontent.com/meips/ADKq_Nbpf13pVUS027zx01qWXmK7W89VKeoPalowC9VtaB-Dr0_mUj2-ixs1efbd5fVp27hTAH65EFFK0bwf6vg-NyOjdrhIA4huMqnUjYFaNPbJ9e56YAly-PY=s0-d-e1-ft#https://storage.googleapis.com/vamos/extia/se_connecter_skills.png