<?php

/**
 * Routes disponibles dans le projet
 * 
 * Format: url => [Controller, méthode]
 */
$routes = [
    "index" => ["SiteController", "menu"],
    "about" => ["SiteController", "aboutUs"],
    "admin" => ["UserController", "login"],
    "login" => ["UserController", "login"],
    "newsletter-subscribe" => ["SiteController", "storeNewsletter"],
    "account-connect" => ["UserController", "connect"],
    "account-store" => ["UserController", "store"],
    "account-disconnect" => ["UserController","disconnect"],
    "admin-panel" => ["UserController", "admin"],
    "content-menu-add" => ["UserController","addMenuItem"],
    "content-menu-store" => ["UserController","storeMenuItem"],
    "content-menu-modify" => ["UserController","modify"],
    "content-category-add"=> ["UserController","addCategory"],
    "account-add"=> ["UserController","store"],
    "account-remove"=> ["UserController","accountDelete"],
    "account-list"=> ["UserController","accountIndex"],

];
