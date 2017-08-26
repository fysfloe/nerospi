<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NSC extends Model
{
  protected $table = 'nscs';

  protected $fillable = [
    'name', 'health'
  ];

  public function settlement() {
    return $this->belongsTo('App\Settlement');
  }
}
