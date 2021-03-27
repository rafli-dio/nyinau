<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
   public $fillable = ['name'];

    public function schedule()
    {
      return $this->hasMany(Schedule::class);
    }

}
