<?php

class AddVesselController
{
    public static function index(){
        ob_start();
        Viewer::view('views/front/add-your-vessel');
        $content = ob_get_clean();
        Viewer::view('views/layout', ['content' => $content,'title'=>'Add Vessel']);
    }

}