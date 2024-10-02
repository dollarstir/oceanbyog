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
        ShipController::getShipsByCategory($context['id']);
    }),

    // Example of defining a route for displaying ships by subcategory
//    new Route('/ships/{id}/{page?}', function ($context) {
//        $subcategoryId = $context['id'];
//        $page = isset($context['page']) ? (int)$context['page'] : 1;  // Default to page 1 if not set
//        ShipController::getShipsByCategory($subcategoryId, $page);
//    }),



    new Route('/ship/{shipid}', function ($context) {
        ShipController::getShipDetail($context['shipid']);
    }),

    new Route('/add-your-vessel', function () {
        AddVesselController::index();
    }),

    new Route('/bunker-prices', function () {
        HomeController::bunkerPrices    ();
    }),
    new Route('/demolition-market', function () {
        HomeController::demoilitionMarket();
    }),
    new Route('/currency-exchange-rates', function () {
        HomeController::currencyExchangeRates();
    })
    // Add more routes as necessary
];
