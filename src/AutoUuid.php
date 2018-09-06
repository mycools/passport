<?php
namespace Mycools\Passport;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
trait AutoUuid {
    protected static function bootAutoUuid()
    {
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
