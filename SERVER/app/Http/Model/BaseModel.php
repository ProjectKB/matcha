<?php

namespace App\Http\Model;

use App\Support\DB;

abstract class BaseModel
{
    final public function find($id)
    {
        $response = DB::$db->query("SELECT * FROM " . $this->getTableName() . " WHERE id=${id}");
        $fetchedValues = mysqli_fetch_assoc($response);
        $this->setInstanceOfFields($fetchedValues);

        return $this;
    }

    private function setInstanceOfFields(array $fetchedValues)
    {
        $fillable = $this->getFillable();

        array_walk($fillable, fn($snakeField, $camelField) => array_key_exists($snakeField, $fetchedValues)
            ? $this->$camelField = $fetchedValues[$snakeField]
            : NULL);
    }

    abstract public function getTableName();

    abstract public function getFillable();
}