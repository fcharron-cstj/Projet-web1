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
     * Displays the admin panel
     *
     * @return void
     */
    public function admin()
    {
        $this->protectRoute();
        $this->view("admin/admin", ["dishes" => (new Dish)->getEveryDish()]);
    }

    /**
     * Displays the admin panel
     *
     * @return void
     */
    public function addMenuItem()
    {
        $this->protectRoute();
        $this->view("admin/menu.add", ["categories" => (new Category)->getCategories()]);
    }

    /**
     * Stores the information from the register form in the database
     *
     * @return void
     */
    public function storeAccount()
    {
        $this->protectRoute();

        //Checks for access level
        $user_model = new User;
        $role = $user_model->getRole($_SESSION["user_id"]);

        if ($role->role != 1) {
            $this->redirect("admin-panel?access_denied");
        }

        // Checks for credentials
        if (
            empty($_POST["username"]) ||
            empty($_POST["email"]) ||
            empty($_POST["password"]) ||
            empty($_POST["password_confirmation"])
        ) {
            $this->redirect("account-list?missing_info");
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
        $this->protectRoute();
        // Checks information
        if (
            empty($_POST["title"]) ||
            empty($_POST["description"]) ||
            empty($_POST["price"]) ||
            empty($_FILES["image"]) ||
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
        $success = $dish_model->storeMenuItem(
            $_POST["title"],
            $_POST["description"],
            $image,
            $_POST["price"],
            $_POST["section"],
        );

        if (!$success) {
            $this->redirect("content-menu-add?error");
        }

        foreach ($_POST["categories"] as $category) {
            $success = $dish_model->addMenuCategories($category);
            if (!$success) {
                $this->redirect("content-menu-add?error");
            }
        }


        $this->redirect("content-menu-add?register_success");
    }

    public function showMenuItem()
    {
        $this->protectRoute();
        $dish = (new Dish)->getDishFromId($_GET["id"]);
        $dish->categories = explode(",", $dish->categories);
        $this->view("admin/modify", ["dish" => $dish, "categories" => (new Category)->getCategories()]);
    }

    public function modifyMenuItem()
    {
        $this->protectRoute();
        if (empty($_POST["id"])) {
            $this->redirect("admin-panel?error");
        }

        // Checks information
        if (
            empty($_POST["title"]) ||
            empty($_POST["description"]) ||
            empty($_POST["price"]) ||
            empty($_FILES["image"]) ||
            empty($_POST["categories"]) ||
            empty($_POST["section"])
        ) {

            $this->redirect("content-menu-show?id=" . $_POST['id'] . "?missing_info");
        }

        // Stores the image
        $image = null;
        if (!empty($_FILES["image"])) {
            $upload = new Upload("image");
            $image = $upload->InsertInto("uploads");
        }

        // Stores the information
        $dish_model = new Dish;
        $success = $dish_model->modifyMenuItem(
            $_POST["id"],
            $_POST["title"],
            $_POST["description"],
            $image,
            $_POST["price"],
            $_POST["section"],
        );
        if (!$success) {
            $this->redirect("content-menu-show?id=" . $_POST['id'] . "?error");
        }

        $success = $dish_model->deleteMenuItemCategories($_POST["id"]);
        if (!$success) {
            $this->redirect("content-menu-show?id=" . $_POST['id'] . "?error");
        }


        foreach ($_POST["categories"] as $category) {
            $success = $dish_model->addMenuCategories($category, $_POST["id"]);
            if (!$success) {
                $this->redirect("content-menu-show?id=" . $_POST['id'] . "?error");
            }
        }

        $this->redirect("admin-panel?register_success");
    }



    public function accountIndex()
    {
        $this->protectRoute();

        //Checks for access level
        $user_model = new User;
        $role = $user_model->getRole($_SESSION["user_id"]);

        if ($role->role != 1) {
            $this->redirect("admin-panel?access_denied");
        }
        $this->view("admin/account.index", ["users" => (new User)->tout()]);
    }

    public function deleteAccount()
    {
        $this->protectRoute();

        //Checks for access level
        $user_model = new User;
        $role = $user_model->getRole($_GET["id"]);

        if ($role->role == 1) {
            $this->redirect("admin-panel?error");
        }
        $user_model = new User;
        $success = $user_model->deleteAccount($_GET["id"]);

        if (!$success) {
            $this->redirect("account-list?error");
        }

        $this->redirect("account-list?delete-success");

    }

    public function categoryIndex()
    {
        $this->protectRoute();

        //Checks for access level
        $user_model = new User;
        $role = $user_model->getRole($_SESSION["user_id"]);

        if ($role->role != 1) {
            $this->redirect("admin-panel?access_denied");
        }
        $this->view("admin/sections.index", ["sections" => (new Category)->getSections()]);

    }

    public function storeSection()
    {
        $this->protectRoute();

        //Checks for access level
        $user_model = new User;
        $role = $user_model->getRole($_SESSION["user_id"]);

        if ($role->role != 1) {
            $this->redirect("admin-panel?access_denied");
        }
        if (
            empty($_POST["title"])
        ) {
            $this->redirect("content-category-list?missing_info");
        }

        // Stores the information
        $category_model = new Category;
        $success = $category_model->storeSection(
            $_POST["title"],
        );

        if (!$success) {
            $this->redirect("content-category-list?error");
        }

        $this->redirect("content-category-list?add_success");
    }

    public function deleteSection()
    {
        $this->protectRoute();

        //Checks for access level
        $user_model = new User;
        $role = $user_model->getRole($_SESSION["user_id"]);

        if ($role->role != 1) {
            $this->redirect("admin-panel?access_denied");
        }
        $category_model = new Category;
        $success = $category_model->deleteSection($_GET["id"]);

        if (!$success) {
            $this->redirect("content-category-list?error");
        }

        $this->redirect("content-category-list?delete-success");
    }

    public function modifySection()
    {
        var_dump($_POST);
        exit();

        $this->protectRoute();

         //Checks for access level
         $user_model = new User;
         $role = $user_model->getRole($_SESSION["user_id"]);
 
         if ($role->role != 1) {
             $this->redirect("admin-panel?access_denied");
         }

        if (empty($_POST["id"])) {
            $this->redirect("admin-panel?error");
        }

        // Checks information
        if (
            empty($_POST["title"])
        ) {

            $this->redirect("content-category-list?missing_info");
        }

        // Stores the information
        $dish_model = new Category;
        $success = $dish_model->modifySection(
            $_POST["id"],
            $_POST["title"],
        );
        if (!$success) {
            $this->redirect("content-category-list?error");
        }

        $this->redirect("content-category-list?register_success");
    }
}
