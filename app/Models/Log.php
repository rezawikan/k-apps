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
}
