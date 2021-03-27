<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name'];

    public function schedule()
    {
      return $this->hasMany(Schedule::class);
    }
}
