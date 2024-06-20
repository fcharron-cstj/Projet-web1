<?php

namespace Controllers;

use Bases\Controller;
use Models\Dish;
class SiteController extends Controller
{

    public function menu()
    {
        $this->view("menu", ["dishes" => (new Dish)->everyDish()]);
    }
    public function aboutUs()
    {
        $this->view("about");
    }
    public function admin()
    {
        $this->view("admin");
    }
}
