<?php
include 'Database.php';
class Model extends Database
{
    protected static $table;

    public static function getAll()
    {
        $sql = "SELECT * FROM " . static::$table;
        $query = self::connect()->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public static function create($data)
    {
        $columns = implode(", ", array_keys($data));
        $values = implode("', '", array_values($data));

        $sql = "INSERT INTO " . static::$table . "({$columns}) VALUES ('{$values}')";
        $stmt = self::connect()->prepare($sql);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public static function getProductByID($id)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE id = :id";
        $statement = self::connect()->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    public static function update(array $data, int $id)
    {
        $stringValues = "";
        foreach($data as $key => $value){

            $stringValues .= "{$key} = '{$value}',";
        }

        $cleanedstringValues = rtrim($stringValues, ',');

        $sql =  "UPDATE " . static::$table . " SET {$cleanedstringValues}  WHERE id = {$id}";
        $statement = self::connect()->prepare($sql);

        if ($statement->execute()) {
            return 'Updated successfully';
        }

        return 'Update failed';

    }

    public static function delete($id)
    {
        $sql = "DELETE FROM " . static::$table . " WHERE id = :id";
        $statement = self::connect()->prepare($sql);
        $statement->bindParam(':id', $id);
        if($statement->execute()){
            return true;
        }else{
            return false;
        }
    }
}

?>