<?php
include "Database.php";
class Modal extends DB
{
    public static function getAll()
    {
        $sql = "SELECT * FROM " . static::$table;
        $statement = self::connect()->query($sql);
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public static function delete(int $id)
    {
        $sql = "DELETE FROM " . static::$table . " WHERE id = :id";
        $statement = self::connect()->prepare($sql);
        $statement -> bindParam(':id', $id);

        if($statement->execute()){
            return true;
        }else{
            return false;
        }
    }

    public static function getStudentByID(int $id)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE id = :id";
        $statement = self::connect()->prepare($sql);  
        $statement->bindParam(':id', $id);
        return $statement->fetch(PDO::FETCH_OBJ);

        if($statement->execute()){
            return true;
        }else{
            return false;
        }
    }

    public static function update(array $data, int $id)
    {
        $items = "";
        foreach($data as $key => $value){
            $items .= "{$key} = '{$value}',";
        }
        $fixeditems = rtrim($items, ",");

        $sql = "UPDATE " . static::$table . " SET {$fixeditems} WHERE id = :id";
        $statement = self::connect()->prepare($sql);
        $statement->bindParam(':id', $id);

        if($statement->execute()){
            return true;
        }else{
            return false;
        }
    }

    public static function create($data)
    {
        $keys = implode(",", array_keys($data));
        $values = implode("','", array_values($data));

        $sql = "INSERT INTO " . static::$table . "({$keys}) VALUES ('{$values}')";
        $statement = self::connect()->prepare($sql);

        if($statement->execute()){
            return true;
        }else{
            return false;
        }
    }

    public static function sorting($col, $sign, $value)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE {$col} {$sign} :value";
        $statement = self::connect()->prepare($sql);  
        $statement->bindParam(':value', $value);
        
        if($statement->execute()){
            return $statement->fetchAll(PDO::FETCH_OBJ);
        }else{
            return false;
        }  
    }

    public static function sortingByLike($col, $value)
    {
        $sql = "SELECT * FROM " . SELF::$table . " WHERE {$col} LIKE :value";
        $value = '%{$value}%';
        $statement = self::connect()->prepare($sql);  
        $statement->bindParam(':value', $value);
        
        if($statement->execute()){
            return $statement->fetchAll(PDO::FETCH_OBJ);
        }else{
            return false;
        }     
    }

}

?>