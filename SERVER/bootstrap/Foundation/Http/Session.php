<?php

namespace Boot\Foundation\Http;

use Symfony\Component\HttpFoundation\Session\Session as SymfonySession;

class Session extends SymfonySession
{
    public function flash($key = false, $value = false)
    {
        if (!$key and !$value) {
            return $this->getFlashBag();
        }

        if ($key and !isset($value)) {
            return data_get($this->getFlashBag()->all(), $key);
        }

        if ($key and isset($value)) {
            return $this->getFlashBag()->add($key, $value);
        }
    }

    public function validator($input, $rules = [])
    {
        $validator = validator($input, $rules);

        if ($validator->fails()) {
            $this->flash()->set(
                'errors',
                $validator->getErrors()
            );

            $this->flash()->set(
                'old',
                $input
            );
        }

        return $validator;
    }
}