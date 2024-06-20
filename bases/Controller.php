<?php

namespace Bases;

class Controller
{
    /**
     * Redirects to the page error404
     * 
     * @return void
     */
    public function erreur404()
    {
        $this->view("erreurs/404", [
            "titre" => "Page introuvable"
        ]);
    }

    /**
     * Redirects the user to the homepage if there is no user_id in the session
     *
     * @return void
     */
    public function protectRoute()
    {
        if (empty($_SESSION["user_id"])) {
            $this->redirect("index");
        }
    }

    /**
     * Redirects to the URL given
     *
     * @param string $url
     * @return void
     */
    protected function redirect($url)
    {
        header("location: $url");
        exit();
    }

    /**
     * Includes the view given
     *
     * @param string $chemin
     * @param array $donnees
     * @return void
     */
    protected function view($chemin, $donnees = [])
    {
        extract($donnees);
        include("views/$chemin.view.php");
    }
}
