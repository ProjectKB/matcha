<?php

namespace App\Support;

use Symfony\Component\Yaml\Yaml;

class Translator
{
    private array $translations = [];

    public function __construct()
    {
        $path = languages_path(config('app.locale'));
        $folder = scandir($path);
        $files = array_slice($folder, 2, count($folder));

        array_walk($files, fn ($file) => $this->translations[str_replace(".yaml", "", $file)] = Yaml::parseFile("$path/$file"));
    }

    public function translate(string $category, string $key, string $attribute): string
    {
        return str_replace(':attribute', $attribute, $this->translations[$category][$key]);
    }
}