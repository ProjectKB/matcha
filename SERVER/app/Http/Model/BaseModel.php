<?php

namespace App\Http\Model;

use App\Support\DB;

abstract class BaseModel
{
    final public function find($id)
    {
        $response = DB::$db->query("SELECT * FROM " . $this::$tableName . " WHERE id=${id}");
        $fetchedValues = mysqli_fetch_assoc($response);

        return $this->make($fetchedValues);
    }

    final public function create($elements)
    {
        $values = array_map(fn($elem) => "'{$elem}'", array_values($elements));
        $query = "INSERT INTO {$this->getTableName()} ("
            . implode(',', array_keys($elements)) . ") VALUES ("
            . implode(',', $values) . ")";

        return DB::$db->query($query) ? $this->make($elements) : NULL;
    }

    final public function make(array $fetchedValues)
    {
        $fillable = $this->getFillable();

        array_walk($fillable, fn($snakeField, $camelField) => array_key_exists($snakeField, $fetchedValues)
            ? $this->$camelField = $fetchedValues[$snakeField]
            : NULL);

        return $this;
    }

    final public function getTableName()
    {
        return strtolower(class_basename($this)) . "s";
    }

    abstract public function getFillable();
}