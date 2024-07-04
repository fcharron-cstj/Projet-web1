<?php

namespace Controllers;

use Bases\Controller;
use Models\Dish;
use Models\Newsletter;
use Models\Category;
class SiteController extends Controller
{

    /**
     * Redirects the user to the main menu page with information about dishes and sections for displaying purposes
     *
     * @return void
     */
    public function menu()
    {
        $this->view("menu", ["dishes" => (new Dish)->getEveryDish(),"sections" => (new Category)->getSections()]);
    }

    /**
     * Redirects the user to the about page
     *
     * @return void
     */
    public function aboutUs()
    {
        $this->view("about");
    }

    /**
     * Stores the user information in the database
     *
     * @return void
     */
    public function storeNewsletter()
    {
        //TODO spam protection

        if (
            empty($_POST["first_name"]) ||
            empty($_POST["last_name"]) ||
            empty($_POST["email"])
        ) {
            $this->redirect("index?newsletter_missing#newsletter");
        }
        $success = (new Newsletter)->store(
            $_POST["first_name"],
            $_POST["last_name"],
            $_POST["email"]
        );

        if (!$success) {
            $this->redirect("index?newsletter_error#newsletter");
        }

        $this->redirect("index?newsletter_success#newsletter");
    }
}
