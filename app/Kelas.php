<?php

namespace App;

use App\Student;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
  protected $table = 'class';
  protected $fillable = ['name'];

  public function student()
  {
    return $this->hasOne(Student::class);
  }
}
