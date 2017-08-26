<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settler extends Model
{
  protected $table = 'settlers';

  protected $fillable = [
    'name', 'fitness', 'charm', 'creativity', 'logic', 'skill', 'knowledge', 'health', 'children', 'job_id', 'job_step'
  ];

  public function partner() {
    return $this->belongsTo('App\Settler');
  }

  public function settlement() {
    return $this->belongsTo('App\Settlement');
  }

  public function buildings() {
    return $this->hasMany('App\Building');
  }

  public function job() {
    return $this->belongsTo('App\Job');
  }
}
