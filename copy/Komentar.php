<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table='Komentar';

    public function pertanyaan(){
    	return $this->belongsTo('App\Pertanyaan','pertanyaan_id', 'id');
    }

    public function jawaban(){
    	return $this->belongsTo('App\Jawaban','jawaban_id', 'id');
    }

    public function author_pertanyaan(){
    	return $this->belongsTo('App\Pertanyaan','pertanyaan_user_id', 'user_id');
    }

    public function author_jawaban(){
    	return $this->belongsTo('App\Jawaban', 'jawaban_user_id', 'user_id');
    }
}
