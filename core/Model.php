<?php

class Model
{
    protected static $table; // Each child class can define its table name

    protected $attributes = []; // Store object properties dynamically

    // Magic getter
    public function __get($name)
    {
        return $this->attributes[$name] ?? null;
    }

    // Magic setter
    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    // Insert a new record
    public function save()
    {
        try {
            $columns = implode(", ", array_keys($this->attributes));
            $placeholders = implode(", ", array_map(function () {
                return "?";
            }, $this->attributes));

            $sql = "INSERT INTO " . static::$table . " ($columns) VALUES ($placeholders)";
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare($sql);
            $stmt->execute(array_values($this->attributes));
            return true;
        } catch (Exception $e) {
            echo "Error saving record: " . $e->getMessage();
            return false;
        }
    }

    // Update existing record based on custom conditions
    public function update($conditions = [])
    {
        try {
            $setClause = implode(", ", array_map(function ($key) {
                return "$key = ?";
            }, array_keys($this->attributes)));

            $whereClause = implode(" AND ", array_map(function ($key) {
                return "$key = ?";
            }, array_keys($conditions)));

            $sql = "UPDATE " . static::$table . " SET $setClause WHERE $whereClause";

            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare($sql);
            $stmt->execute(array_merge(array_values($this->attributes), array_values($conditions)));
            return true;
        } catch (Exception $e) {
            echo "Error updating record: " . $e->getMessage();
            return false;
        }
    }

    // Find records based on custom conditions
    public static function find($conditions = [])
    {
        try {
            $whereClause = implode(" AND ", array_map(function ($key) {
                return "$key = ?";
            }, array_keys($conditions)));

            $sql = "SELECT * FROM " . static::$table . " WHERE $whereClause";

            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare($sql);
            $stmt->execute(array_values($conditions));

            return $stmt->fetchObject(static::class);
        } catch (Exception $e) {
            echo "Error finding record: " . $e->getMessage();
            return null;
        }
    }

    // Find a record by ID
    public static function findById($id)
    {
        return static::find(['id' => $id]);
    }

    // Fetch all records
    public static function all()
    {
        try {
            $sql = "SELECT * FROM " . static::$table;
            $db = Database::getInstance()->getConnection();
            $stmt = $db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_CLASS, static::class);
        } catch (Exception $e) {
            echo "Error fetching records: " . $e->getMessage();
            return [];
        }
    }

    // Delete records based on custom conditions
    public static function delete($conditions = [])
    {
        try {
            $whereClause = implode(" AND ", array_map(function ($key) {
                return "$key = ?";
            }, array_keys($conditions)));

            $sql = "DELETE FROM " . static::$table . " WHERE $whereClause";

            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare($sql);
            $stmt->execute(array_values($conditions));
            return true;
        } catch (Exception $e) {
            echo "Error deleting record: " . $e->getMessage();
            return false;
        }
    }

    // Delete a record by ID
    public static function deleteById($id)
    {
        return static::delete(['id' => $id]);
    }

    /**
     * Execute a custom SQL query.
     *
     * @param string $sql SQL query with placeholders (e.g. "SELECT * FROM users WHERE id = ? AND name = ?")
     * @param array $params Values to replace the placeholders (e.g. [1, "kofi"])
     * @return mixed Result of the query (fetches results as objects if SELECT, true for success on others)
     */
    public static function customQuery($sql, $params = [])
    {
        try {
            // Get the database connection instance
            $db = Database::getInstance()->getConnection();

            // Prepare the SQL statement
            $stmt = $db->prepare($sql);

            // Execute the SQL statement with provided parameters
            $stmt->execute($params);

            // Determine the type of query to process accordingly
            $queryType = strtolower(strtok(trim($sql), ' '));
            ;

//            var_dump($sql);
//            exit;


            switch ($queryType) {
                case 'select':
                    // For SELECT queries, fetch and return results
                    $result = $stmt->fetchAll(PDO::FETCH_CLASS, static::class);
                    return $result ?: []; // Return an empty array if no results found

                case 'insert':
                    // For INSERT queries, return the last inserted ID
                    return $db->lastInsertId();

                case 'update':
                case 'delete':
                    // For UPDATE and DELETE queries, return the number of affected rows
                    return $stmt->rowCount();

                default:
                    // For other types of queries (if any), return true on successful execution
                    return true;
            }

        } catch (Exception $e) {
            // Log the error message
            error_log("Error executing custom query: " . $e->getMessage());
            return false;
        }
    }


}
