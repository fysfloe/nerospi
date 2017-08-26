<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settlement extends Model
{
  public function settlers() {
    return $this->hasMany('App\Settler');
  }

  public function nscs() {
    return $this->hasMany('App\NSC');
  }

  public function buildings() {
    return $this->hasMany('App\Building');
  }
}
