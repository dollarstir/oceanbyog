<?php


return [
    new Route('/', function () {
        HomeController::index();
    }),
    new Route('/home', function () {
        HomeController::index();
    }),
    new Route('/ships', function () {
        ShipController::index();
    }),

    new Route('/ships/{id}', function ($context) {
        ShipController::getShipsByCategor($context['id']);
    }),

    new Route('/ship/{shipid}', function ($context) {
        ShipController::getShipDetail($context['shipid']);
    }),

    new Route('/add-your-vessel', function () {
        AddVesselController::index();
    }),

    new Route('/bunker-prices', function () {
        HomeController::bunkerPrices    ();
    }),
    new Route('/newpackage', function () {
        AdminController::addPackage();
    })
    // Add more routes as necessary
];
