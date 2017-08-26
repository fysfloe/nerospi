<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
  protected $table = 'jobs';

  protected $fillable = ['name', 'step1', 'step2', 'step3', 'step4', 'step5'];

  public function settlers() {
    return $this->hasMany('App\Settler');
  }
}
