<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
  protected $table = 'buildings';

  protected $fillable = [
    'type', 'name', 'gains', 'stability', 'settler_id', 'settlement_id'
  ];

  public function settlement() {
    return $this->belongsTo('App\Settlement');
  }

  public function settler() {
    return $this->belongsTo('App\Settler');
  }
}
