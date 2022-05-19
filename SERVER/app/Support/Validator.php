<?php

namespace App\Support;

use App\Http\Model\User;


class Validator
{
    private array $errors = [];

    public function make(array $input, array $field_rules)
    {
        $translator = app()->resolve(Translator::class);

        foreach ($field_rules as $key => $rules) {
            $rules = explode("|", $rules);

            foreach ($rules as $rule) {
                if (str_contains($rule, 'min') || str_contains($rule, 'max')) {
                    [$rule, $limit] = explode(':', $rule);

                    if (!$this->$rule($input[$key], $limit)) {
                        $this->setErrors($translator->translate('validation', $rule, $limit));
                    }
                } else {
                    if (!$this->$rule($input[$key])) {
                        $this->setErrors($translator->translate('validation', $rule, $input[$key]));
                    }
                }
            }
        }
    }

    public function fails(): bool
    {
        return count($this->getErrors()) > 0;
    }

    private function required(string $input): bool
    {
        return !empty($input);
    }

    private function email(string $input): bool
    {
        return (bool)filter_var($input, FILTER_VALIDATE_EMAIL);
    }

    private function unique(string $input): bool
    {
        return !((bool)(new User())->find_by(['email' => $input]));
    }

    private function min(string $input, int $limit): bool
    {
        return mb_strlen($input) >= $limit;
    }

    private function max(string $input, int $limit): bool
    {
        return mb_strlen($input) <= $limit;
    }

    private function string(string $input): bool
    {
        return true;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function setErrors(string $error): self
    {
        $this->errors[] = $error;

        return $this;
    }
}