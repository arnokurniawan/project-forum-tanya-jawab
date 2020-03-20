<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jawaban;
use App\Pertanyaan;
use App\User;
use App\Vote;
use App\Komentar;
use Auth;

class JawabanController extends Controller
{
    
    public function store(Request $request, $id){
        // dd($status);
        // $request->validate([
        //     "isi" => "required|min:10"
        // ]);

    	$jawaban = new Jawaban;
    	// dd($jawaban);
    	$pertanyaan = Pertanyaan::find($id);
    	// dd($pertanyaan);
        $user_id = Auth::id();
    	$jawaban->isi = $request->isi;
    	$jawaban->pertanyaan_id = $id;
    	$jawaban->pertanyaan_user_id = $pertanyaan->user_id;
    	$jawaban->user_id = $user_id;
    	// dd($jawaban);
    	$jawaban->save();
        
    	// $pertanyaan_data = Pertanyaan::find($id);
        $jawaban = Jawaban::where('pertanyaan_id', $pertanyaan->id )->orderBy('id','desc')->orderBy('paling_tepat','desc')->get();
        
        $komentar = Komentar::where('pertanyaan_id', $pertanyaan->id)->orderBy('id','desc')->get();
        $user = User::where('id',$pertanyaan->user_id)->get();

        return view('pertanyaan.show', ["pertanyaan" => $pertanyaan, "jawaban"=>$jawaban, "komentar"=>$komentar, "user"=>$user]);
       
    }

    public function edit($id){
        $jawaban = Jawaban::find($id);
        return view('jawaban.edit', ["jawaban" => $jawaban]);        
    }

    public function update(Request $request, $id){
        $jawaban = Jawaban::find($id);
        $pertanyaan = Pertanyaan::where('id', $jawaban->pertanyaan_id )->get();
        $pertanyaan = $pertanyaan[0];
        $jawaban->isi = $request->isi;
        $jawaban->save();
        $jawaban = Jawaban::with('question')->where('pertanyaan_id', $pertanyaan->id)->orderBy('paling_tepat','desc')->get();
        // $portfolios = Portfolio::with('author')->where('pertanyaan_id', $user->id)->get();
       // dd($pertanyaan);
        $komentar = Komentar::where('pertanyaan_id', $pertanyaan->id)->orderBy('id','desc')->get();
        $user = User::where('id',$pertanyaan->user_id)->get();

        return view('pertanyaan.show', ["pertanyaan" => $pertanyaan, "jawaban"=>$jawaban, "komentar"=>$komentar, "user"=>$user]);
       
    }

    public function delete($id){
        $jawaban = Jawaban::find($id);
        $pertanyaan = Pertanyaan::where('id', $jawaban->pertanyaan_id )->get();
        $pertanyaan = $pertanyaan[0];       // perhatikan bentuk response dengan dd
        Jawaban::destroy($id);
        $jawaban = Jawaban::with('question')->where('pertanyaan_id', $pertanyaan->id)->orderBy('paling_tepat','desc')->get();

        $komentar = Komentar::where('pertanyaan_id', $pertanyaan->id)->orderBy('id','desc')->get();
        $user = User::where('id',$pertanyaan->user_id)->get();

        return view('pertanyaan.show', ["pertanyaan" => $pertanyaan, "jawaban"=>$jawaban, "komentar"=>$komentar, "user"=>$user]);
               // return redirect()->route('pertanyaan.index');
    }

    public function upvote($user_id, $tanya_id, $answer_id){
        $user_auth = Auth::id();
        $vote = Vote::where('user_id', $user_auth)->where('jawaban_id', $answer_id)->first();
        // $jawabantepat = Jawaban::where('id', $answer_id)->where('paling_tepat', 1)->first();

        if (!$vote){

            $vote = new Vote;
            $vote->user_id = $user_auth;
            $vote->jawaban_id = $answer_id;
            $vote->save();
            $user = User::find($user_id);
            $user->poin_reputasi = $user->poin_reputasi + 10;
            $user->save();
        }

        $pertanyaan = Pertanyaan::find($tanya_id);
        $jawaban = Jawaban::where('pertanyaan_id', $pertanyaan->id )->orderBy('paling_tepat','desc')->get();
        $komentar = Komentar::where('pertanyaan_id', $pertanyaan->id)->orderBy('id','desc')->get();
        $user = User::where('id',$pertanyaan->user_id)->get();

        return view('pertanyaan.show', ["pertanyaan" => $pertanyaan, "jawaban"=>$jawaban, "komentar"=>$komentar, "user"=>$user]);
       
    }

    public function downvote($user_id, $tanya_id){
        $user = User::find($user_id);
        $user->poin_reputasi = $user->poin_reputasi - 1;
        $user->save();
        $pertanyaan = Pertanyaan::find($tanya_id);
        $jawaban = Jawaban::where('pertanyaan_id', $pertanyaan->id )->orderBy('paling_tepat','desc')->get();

        $komentar = Komentar::where('pertanyaan_id', $pertanyaan->id)->orderBy('id','desc')->get();
        $user = User::where('id',$pertanyaan->user_id)->get();

        return view('pertanyaan.show', ["pertanyaan" => $pertanyaan, "jawaban"=>$jawaban, "komentar"=>$komentar, "user"=>$user]);

    }

    public function palingtepat($user_id, $tanya_id, $answer_id){     // route juga harus di rubah
        // dd($user_id, $tanya_id, $answer_id);
        $user = User::find($user_id);
        $user->poin_reputasi = $user->poin_reputasi + 15;
        $user->save();
        
        $jawaban = Jawaban::where('id', $answer_id)->first();  //error jika menggunakan get()

        // dd($jawaban);
        // $jawaban = Jawaban::where('pertanyaan_id', $pertanyaan->id )->get();
        $jawabantepat = Jawaban::where('pertanyaan_id', $tanya_id)->where('paling_tepat', 1)->first();
        // dd($jawabantepat);
        if($jawabantepat == ''){
            $jawaban->paling_tepat = 1;
            $jawaban->save();
        }

        $pertanyaan = Pertanyaan::find($tanya_id);
        // $jawaban = Jawaban::where('pertanyaan_id', $pertanyaan->id )->orderBy('id','desc')->get();
        $jawaban = Jawaban::where('pertanyaan_id', $pertanyaan->id )->orderBy('paling_tepat','desc')->get();

        $komentar = Komentar::where('pertanyaan_id', $pertanyaan->id)->orderBy('id','desc')->get();
        $user = User::where('id',$pertanyaan->user_id)->get();

        return view('pertanyaan.show', ["pertanyaan" => $pertanyaan, "jawaban"=>$jawaban, "komentar"=>$komentar, "user"=>$user]);
       
    }

}












