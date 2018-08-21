<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['page','type','old_value','new_value','delete_value','email'];

    /**
    * Set the user's first name.
    *
    * @param  string  $value
    * @return void
    */
    public function setNewValueAttribute($value)
    {
        $this->attributes['new_value'] = json_encode($value);
    }

    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getOldValueAttribute($value)
    {
        return json_decode($value);
    }

    /**
    * Set the user's first name.
    *
    * @param  string  $value
    * @return void
    */
    public function setOldValueAttribute($value)
    {
        $this->attributes['old_value'] = json_encode($value);
    }

    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getNewValueAttribute($value)
    {
        return json_decode($value);
    }

    /**
    * Set the user's first name.
    *
    * @param  string  $value
    * @return void
    */
    public function setDeleteValueAttribute($value)
    {
        $this->attributes['delete_value'] = json_encode($value);
    }

    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getDeleteValueAttribute($value)
    {
        return json_decode($value);
    }
}
