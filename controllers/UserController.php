<?php

namespace Controllers;

use Bases\Controller;
use Models\Category;
use Models\Dish;
use Utils\Upload;
use Models\User;

class UserController extends Controller
{
    /**
     * Displays the log-in form
     *
     * @return void
     */
    public function login()
    {
        // Redirects the user to the admin page if they have a user_id in the session
        if (!empty($_SESSION["user_id"])) {
            $this->redirect("admin-panel");
        }
        $this->view("admin/login");
    }

    /**
     * Displays the register form
     *
     * @return void
     */
    public function create()
    {
        $this->view("admin/register");
    }

    /**
     * Displays the admin panel
     *
     * @return void
     */
    public function admin()
    {

        $this->view("admin/admin", ["dishes" => (new Dish)->everyDish()]);
    }

    /**
     * Displays the admin panel
     *
     * @return void
     */
    public function addMenuItem()
    {
        $this->view("admin/menu.add", ["categories" => (new Category)->getCategories()]);
    }

    /**
     * Stores the information from the register form in the database
     *
     * @return void
     */
    public function store()
    {
        // Checks for credentials
        if (
            empty($_POST["username"]) ||
            empty($_POST["email"]) ||
            empty($_POST["password"]) ||
            empty($_POST["password_confirmation"])
        ) {
            $this->redirect("account-register?missing_info");
        }

        // Confirms password
        if ($_POST["password"] != $_POST["password_confirmation"]) {
            $this->redirect("account-register?password_incorrect");
        }

        // Stores the account information
        $user_model = new User;
        $success = $user_model->registerAccount(
            $_POST["username"],
            $_POST["email"],
            password_hash($_POST["password"], PASSWORD_DEFAULT)
        );

        if (!$success) {
            $this->redirect("account-register?account_creation_fail");
        }

        $this->redirect("index?register_success");
    }

    /**
     * Verifies the log-in information and redirects to the main page
     *
     * @return void
     */
    public function connect()
    {
        if (empty($_POST["email"]) || empty($_POST["password"])) {
            $this->redirect("index?information_missing");
        }

        $user_model = new User;
        $user = $user_model->getUserEmail($_POST["email"]);

        // Verifies user's email and password



        if (!$user || !password_verify($_POST["password"], $user->password)) {
            $this->redirect("index?information_invalid");
        }

        $_SESSION["user_id"] = $user->id;

        $this->redirect("admin-panel");
    }

    /**
     * Disconnects the user by removing the session id
     *
     * @return void
     */
    public function disconnect()
    {
        session_destroy();
        $this->redirect("admin?disconnected");
    }

    /**
     * stores menu item information
     *
     * @return void
     */
    public function storeMenuItem()
    {
        // Checks for credentials
        if (
            empty($_POST["title"]) ||
            empty($_POST["description"]) ||
            empty($_POST["price"]) ||
            empty($_POST["image"]) ||
            empty($_POST["categories"]) ||
            empty($_POST["section"])
        ) {
            $this->redirect("content-menu-add?missing_info");
        }

        // Stores the image
        $image = null;
        if (!empty($_FILES["image"])) {
            $upload = new Upload("image");
            $image = $upload->InsertInto("uploads");
        }

        // Stores the information
        $dish_model = new Dish;
        $success = $dish_model->addMenuItem(
            $_POST["title"],
            $_POST["description"],
            $_POST["price"],
            $image,
            $_POST["section"],
        );

        if (!$success) {
            $this->redirect("content-menu-add?error");
        }

        $success = $dish_model->addMenuCategories(
           $_POST["categories"],
        );


        $this->redirect("content-menu-add?register_success");
    }

    public function addCategory()
    {

    }

    public function accountDelete()
    {

    }


}
