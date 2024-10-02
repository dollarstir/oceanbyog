<?php

//namespace models;



class Categories extends Model
{
    protected  static $table = 'categories';

    public static function getRelatedCategories($subcategoryId)
    {
        // Ensure the subcategoryId is valid
        if (!is_numeric($subcategoryId) || $subcategoryId <= 0) {
            error_log("Invalid subcategory ID provided: $subcategoryId");
            return false; // Return false if the subcategory ID is not valid
        }

        // SQL query to fetch ships with their main and subcategory names
        $sql = "
             SELECT name,id FROM `categories` WHERE main_category =?;
        ";

        // Debugging: Print the final SQL query for verification
        error_log("Executing SQL: $sql with subcategoryId: $subcategoryId");

        // Execute the custom query
        $result = self::customQuery($sql, [$subcategoryId]);

        // Check for errors in the query execution
        if ($result === false) {
            error_log("Query failed or returned false. Check SQL and database connection.");
        } else {
            error_log("Query executed successfully. Result: " . print_r($result, true));
        }

        return $result;
    }

    public static function mainCategory($id){
        $sql ="SELECT * FROM main_categories WHERE id=?";
        return self::customQuery($sql, [$id]);
    }

    public static function getShipCategory($shipId){
        $sql ="SELECT c.name 
FROM ship_categories sc
JOIN categories c ON sc.category_id = c.id
WHERE sc.ship_id = ?
";
        return self::customQuery($sql, [$shipId])[0]->name;

    }



    public static  function getMainCategoriesWithSubcategories() {
        $query = "SELECT mc.name AS main_category_name, 
       mc.image AS main_category_image, 
       GROUP_CONCAT(CONCAT(c.id, ':', c.name) ORDER BY c.name) AS categories
FROM main_categories mc
JOIN categories c ON c.main_category = mc.id
GROUP BY mc.id, mc.name, mc.image
ORDER BY mc.id

        ";
        return self::customQuery($query);
    }


}