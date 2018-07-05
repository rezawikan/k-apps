<?php

namespace App\Traits;

trait CreateSlugTrait
{
    /**
       * Set the atrribute slug when saving a record.
       */
    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = str_slug($model->name);
        });
    }
}
