<?php

namespace Audentio\LaravelBase\Illuminate\Validation;

use Illuminate\Validation\Factory as BaseFactory;

class Factory extends BaseFactory
{
    protected function resolve(array $data, array $rules, array $messages, array $attributes)
    {
        if (is_null($this->resolver)) {
            return new Validator($this->translator, $data, $rules, $messages, $attributes);
        }

        return call_user_func($this->resolver, $this->translator, $data, $rules, $messages, $attributes);
    }
}