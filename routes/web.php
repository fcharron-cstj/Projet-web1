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
    "account-disconnect" => ["UserController","disconnect"],
    "admin-panel" => ["UserController", "admin"],
    "content-menu-add" => ["UserController","addMenuItem"],
    "content-menu-store" => ["UserController","storeMenuItem"],
    "content-menu-show" => ["UserController","showMenuItem"],
    "content-menu-modify" => ["UserController","modifyMenuItem"],
    "content-menu-delete" => ["UserController","deleteMenuItem"],
    "content-category-list" => ["UserController","categoryIndex"],
    "content-category-add" => ["UserController","storeSection"],
    "content-category-modify" => ["UserController","modifySection"],
    "content-category-remove" => ["UserController","deleteSection"],
    "account-store"=> ["UserController","storeAccount"],
    "account-delete"=> ["UserController","deleteAccount"],
    "account-list"=> ["UserController","accountIndex"],
];
