<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table="jawaban";

    public function author(){
    	return $this->belongsTo('App\User','user_id','id');
    }

    public function komentar(){
    	return $this->hasMany('App\Komentar', 'jawaban_id');
    }

    public function komentar_user(){
    	return $this->hasMany('App\Komentar','jawaban_user_id');
    }
}
