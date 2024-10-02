<?php

class HomeController
{
    public static function index(){
        try {
            ob_start();

            // Fetch team data
            $team = Team::all();


            // Pass the data to the view
            Viewer::view('views/front/index', ['team' => $team]);
            $content = ob_get_clean();
            Viewer::view('views/layout', [
                'content' => $content,
                'title' => "Oceanwide Premier Vessels"
            ]);

        } catch (Exception $e) {
            // Handle the error, log it, or show a custom error page
            echo "Error: " . $e->getMessage();
        }
    }

    public static function bunkerprices(){
        ob_start();
        Viewer::view('views/front/bunker-prices');
        $content = ob_get_clean();
        Viewer::view('views/layout', ['content' => $content, 'title' => "Bunker Prices"]);
    }

}