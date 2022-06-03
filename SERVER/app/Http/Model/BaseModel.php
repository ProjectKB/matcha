<?php

namespace App\Http\Model;

use App\Support\DB;

abstract class BaseModel
{
    final public function find($id)
    {
        $response = DB::$db->query("SELECT * FROM " . $this->getTableName() . " WHERE id=${id}");
        $fetchedValues = mysqli_fetch_assoc($response);

        if (!$fetchedValues) return false;

        return $this->make($fetchedValues);
    }

    final public function find_by(array $columns)
    {
        $i = 0;
        $size = count($columns);
        $query_columns = "";

        foreach ($columns as $key => $value) {
            $query_columns .= (++$i != $size) ? "`{$key}`='{$value}' AND " : "`{$key}`='{$value}'";
        }

        $response = DB::$db->query("SELECT * FROM " . $this->getTableName() . " WHERE {$query_columns}");

        if (!has_record($response)) {
            return false;
        }

        $fetchedValues = mysqli_fetch_assoc($response);

        return $this->make($fetchedValues);
    }

    final public function create($elements)
    {
        $values = array_map(fn($elem) => "'{$elem}'", array_values($elements));
        $columns = array_map(fn($elem) => "`{$elem}`", array_keys($elements));
        $query = "INSERT INTO {$this->getTableName()} ("
            . implode(',', $columns) . ") VALUES ("
            . implode(',', $values) . ")";

        DB::$db->query($query);

        return $this->make($elements);
    }

    final public function update(array $elements)
    {
        $tmp = "";
        foreach ($elements as $column => $value) {
            $tmp .= "`{$column}` = '{$value}', ";
        }

        $toUpdate = substr($tmp, 0, -2);
        $query = "UPDATE {$this->getTableName()} SET {$toUpdate} WHERE id={$this->id}";

        DB::$db->query($query);

        return $this->make($elements);
    }

    final public function delete($column, $value)
    {
        DB::$db->query("DELETE FROM {$this->getTableName()} WHERE `{$column}`='{$value}'");
    }

    final public function make(array $fetchedValues)
    {
        $fillable = $this->getFillable();

        array_walk($fillable, fn($snakeField, $camelField) => array_key_exists($snakeField, $fetchedValues)
            ? $this->$camelField = $fetchedValues[$snakeField]
            : NULL);

        return $this;
    }

    abstract public function getTableName(): string;

    abstract public function getFillable();
}