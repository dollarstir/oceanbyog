<?php

use models\Category;

class ShipController
{
    public static function index()
    {
        ob_start();
        $main_categories = Categories::getMainCategoriesWithSubcategories();

        Viewer::view('views/front/ships',['main_categories'=> $main_categories]);
        $content = ob_get_clean();
        Viewer::view('views/layout', ['content' => $content,'title'=>"Ships and Commercial Vessels"]);
    }

    public static function getShipsByCategory($subcategoryId)
    {
        // Fetch ships using the subcategory ID
        $result = Ship::getShipsBySubcategory($subcategoryId);

        $relatedCategories =!empty($result[0])?(Categories::getRelatedCategories($result[0]->main_category)):[];



        $title = !empty($result[0]) ? "Ships in ".$result[0]->subcategory_name : 'Ships in Subcategory';



        // Check if the result is empty or false
        if (!$result || empty($result)) {
            $errorMessage = "No ships found in the selected subcategory or invalid subcategory ID.";
            $content = "<h2>$errorMessage</h2>"; // Create a simple error message to show on the view
            Viewer::view('views/layout', ['content' => $content, 'title' => 'No Ships Found']);
            return;
        }

        // Proceed to display the ships if the result is not empty
        ob_start();
        Viewer::view('views/front/shipbysubcategories.php', ['ships' => $result,'relatedCategories' => $relatedCategories]);
//        var_dump($result);
        $content = ob_get_clean();

        // Safely access the subcategory name if it exists


        Viewer::view('views/layout', ['content' => $content, 'title' => $title]);
    }

    public static function getShipDetail($shipId) {
        $result = Ship::findById($shipId);
        if (!$result) {
            // Handle no ship found
            Viewer::view('views/front/404.php', ['message' => 'Ship not found']);
            return;
        }
        $shipImages = Ship::getShipImages($shipId);
        $app= Settings::appData();
        $result->count = Ship::countALlShips();
        $result->main_category_name = Categories::mainCategory($result->main_category)[0]->name;
        $result->category = Categories::getShipCategory($result->id);



//        ob_start();
        Viewer::view("views/front/shipdetail.php", ['ship' => $result, 'shipImages' => $shipImages, 'app' => $app]);
//        $content = ob_get_clean();
//        Viewer::view('views/layout', ['content' => $content]);
    }




}