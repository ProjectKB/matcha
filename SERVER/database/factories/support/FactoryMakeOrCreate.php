<?php

class FactoryMakeOrCreate
{
    public function __construct(public $model, public $count, public $defaultAttributes)
    {

    }

    public static function options(...$arguments)
    {
        return new static (...$arguments);
    }

    /**
     * Create persists to the database
     */
    public function create($attributes = [])
    {
        $model = $this->model;
        $default = $this->defaultAttributes;
        $created = collect([]);

        for ($creating = 1; $creating <= $this->count; $creating++) {
            $record = new $model;

            $created->push(
                $record->create(
                    array_merge($default(Faker\Factory::create()), $attributes),
                )
            );
        }

        return $created;
    }

    /**
     * Make do not persist to the database
     */
    public function make($attributes = [])
    {
        $model = $this->model;
        $default = $this->defaultAttributes;
        $made = collect([]);

        for ($making = 1; $making <= $this->count; $making++) {
            $record = new $model;

            $made->push(
                $record->make(
                    array_merge($default(Faker\Factory::create()), $attributes)
                )
            );
        }

        return $made;
    }
}