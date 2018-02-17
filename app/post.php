<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model 
{
    //
  /*protected $table='posts';
  public $pk='id';
  public $timestamp='true';*/
  protected $fillable = [
        'title', 'content', 
    ];

  public function User()
  {
  	return $this->belongsTo('App\User');
  }
}
