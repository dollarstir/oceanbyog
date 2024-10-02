<?php

class Ship extends Model
{
    protected static $table = 'ship';

    /**
     * Fetch ships that belong to a specific subcategory, including the main category and subcategory names.
     *
     * @param int $subcategoryId The ID of the subcategory.
     * @return array|false List of ships with main category and subcategory names, or false on failure.
     */
    public static function getShipsBySubcategory($subcategoryId)
    {
        // Ensure the subcategoryId is valid
        if (!is_numeric($subcategoryId) || $subcategoryId <= 0) {
            error_log("Invalid subcategory ID provided: $subcategoryId");
            return false; // Return false if the subcategory ID is not valid
        }

        // SQL query to fetch ships with their main and subcategory names
        $sql = "
            SELECT ship.*,
                   
                   main_categories.name AS main_category_name, 
                   categories.name AS subcategory_name
            FROM ship
            INNER JOIN ship_categories ON ship.id = ship_categories.ship_id
            INNER JOIN categories ON ship_categories.category_id = categories.id
            INNER JOIN main_categories ON ship.main_category = main_categories.id
            WHERE categories.id = ?
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


    public static function getShipImages($shipId){
        if (!is_numeric($shipId) || $shipId <= 0) {
            error_log("Invalid ship ID provided: $shipId");
            return false;
        }

            $sql = "SELECT id,url FROM ship_images WHERE ship_id = ?";
        error_log("Executing SQL: $sql");
        $result = self::customQuery($sql, [$shipId]);
        if ($result === false) {
            error_log("Query failed or returned false. SQL: $sql");
            return false;

        } else {
            error_log("Query executed successfully. Result: " . print_r($result, true));
        }
        return $result;

    }

    public static function countALlShips(){
        $sql = "SELECT COUNT(*) as total FROM ship";
        error_log("Executing SQL: $sql");
        $result = self::customQuery($sql);
        return $result[0]->total;
    }

    public static function vesselOfTheMonth(){
        $sql = "
                    SELECT s.name,s.length,s.id,s.thumbnail,c.id as category_id,c.name as category_name  FROM ship s LEFT JOIN  ship_categories sc ON s.id=sc.ship_id
                    LEFT JOIN categories c ON sc.category_id=c.id                                                
                    ORDER BY id DESC 
                    LIMIT 4";
        return self::customQuery($sql);
    }
}
