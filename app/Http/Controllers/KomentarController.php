<?php

namespace App\Http\Controllers;

use App\Komentar;
use App\Jawaban;
use App\Pertanyaan;
use App\User;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
	
    public function store(Request $request, $tanya_id, $jawab_id, $kategori){
    	$komentar = new Komentar;
    	// dd($jawaban);
    	$pertanyaan = Pertanyaan::find($tanya_id);
    	$jawaban = Jawaban::find($jawab_id);
    	// dd($pertanyaan);
    	$komentar->isi = $request->isi;
    	if ($kategori == 'pertanyaan'){
	    	$komentar->pertanyaan_id = $pertanyaan->id;
	    	$komentar->pertanyaan_user_id = $pertanyaan->user_id;
    	   }
    	else{
            // komentar dari jawaban harus memasukkan data pertanyaan_id dan jawaban_id
            $komentar->pertanyaan_id = $pertanyaan->id;
            $komentar->pertanyaan_user_id = $pertanyaan->user_id;
	    	$komentar->jawaban_id = $jawaban->id;
	    	$komentar->jawaban_user_id = $jawaban->user_id;
	        }
    	// dd($jawaban->id);
    	$komentar->save();

    	// $pertanyaan_data = Pertanyaan::find($id);
        $jawaban_data = Jawaban::where('pertanyaan_id', $pertanyaan->id )->orderBy('id','desc')->get();

        $komentar = Komentar::where('pertanyaan_id', $pertanyaan->id)->orderBy('id','desc')->get();
        // dd($komentar);
        $user = User::where('id',$pertanyaan->user_id)->get();

        return view('pertanyaan.show', ["pertanyaan" => $pertanyaan, "jawaban"=>$jawaban_data, "komentar"=>$komentar, "user"=>$user]);
       
    }
}
