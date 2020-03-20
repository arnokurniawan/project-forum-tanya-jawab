<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table="pertanyaan";

    public function author(){
    	return $this->belongsTo('App\User','user_id','id');
    }

    public function jawaban(){
        return $this->hasMany('App\Jawaban', 'pertanyaan_id');
    }

    public function komentar(){
    	return $this->hasMany('App\Komentar', 'pertanyaan_id');
    }

    public function komentar_user(){
    	return $this->hasMany('App\Komentar', 'pertanyaan_user_id');
    }
}
