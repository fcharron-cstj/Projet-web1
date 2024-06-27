<?php

namespace Controllers;

use Bases\Controller;
use Models\Dish;
use Models\Newsletter;
class SiteController extends Controller
{

    public function menu()
    {
        $this->view("menu", ["dishes" => (new Dish)->getEveryDish()]);
    }
    public function aboutUs()
    {
        $this->view("about");
    }
    public function storeNewsletter()
    {
        if (
            empty($_POST["first_name"]) ||
            empty($_POST["last_name"]) ||
            empty($_POST["email"])
        ) {
            $this->redirect("index#newsletter?newsletter_missing");
        }
        $success = (new Newsletter)->store(
            $_POST["first_name"],
            $_POST["last_name"],
            $_POST["email"]
        );

        if (!$success) {
            $this->redirect("index#newsletter?newsletter_error");
        }

        $this->redirect("index#newsletter?newsletter_success");
    }
}
