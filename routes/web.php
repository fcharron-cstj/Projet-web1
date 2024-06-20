<?php

/**
 * Routes disponibles dans le projet
 * 
 * Format: url => [Controller, méthode]
 */
$routes = [
    "index" => ["SiteController", "menu"],
    "about" => ["SiteController", "aboutUs"],
    "admin" => ["SiteController", "admin"],
    "newsletter-subscribe" => ["SiteController", "newsletter-store"],
];
