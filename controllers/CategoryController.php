<?php

use models\Category;

class CategoryController
{
    public static function index(){
        ob_start();
        Viewer::view('views/front/category.php');
        $content = ob_get_clean();
        Viewer::view('views/layout.php',['content'=>$content,'title'=>'Category']);
    }

    public static function create(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            extract($_POST);
            $category = new Category();
            $category->name = $name;
            $category->description= $description;
            if($category->save()) {
                ob_start();
                Viewer::view('views/front/category.php');
                $content = ob_get_clean();
                Viewer::view('views/layout.php',['content'=>$content,'title'=>'Category']);
            }
            else{
                Viewer::view('views/front/category.php');
            }


        }
    }

    public static function getRelatedCategories($mainCategoryId){

        $category = new Category();
        $result = $category->find(['main_category'=>$mainCategoryId]);
        return $result;

    }

    public static function categoryGrouping() {
        // Get data from the model
        $categoriesData = Categories::getMainCategoriesWithSubcategories();

        // Structure the data
        $main_categories = [];
        foreach ($categoriesData as $row) {
            $main_category_name = $row['main_category_name'];
            $main_category_image = $row['main_category_image'];

            if (!isset($main_categories[$main_category_name])) {
                $main_categories[$main_category_name] = [
                    'image' => $main_category_image,
                    'subcategories' => []
                ];
            }

            $main_categories[$main_category_name]['subcategories'][] = [
                'id' => $row['category_id'],
                'name' => $row['category_name']
            ];
        }

        return $main_categories;

    }



}