<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Pertanyaan;
use App\Jawaban;
use App\User;
use App\Vote;
use App\Komentar;

class PertanyaanController extends Controller
{
    public function list(){

    	$pertanyaan = Pertanyaan::all();
    	return view('pertanyaan.list', ["pertanyaan" => $pertanyaan]);

    }

    public function create(){
    	return view('pertanyaan.create');
    }

    public function show($id){
        
        $pertanyaan = Pertanyaan::find($id);
        // dd($pertanyaan->id);
        $jawaban = Jawaban::where('pertanyaan_id', $pertanyaan->id )->orderBy('id','desc')->get();
        // $komentar = Komentar::where('pertanyaan_id', $pertanyaan->id)->orderBy('id','desc')->get();
        // dd($jawaban);
        $komentar = Komentar::where('pertanyaan_id', $pertanyaan->id)->orderBy('id','desc')->get();
        // dd($komentar[0]->id);
        $user = User::where('id',$pertanyaan->user_id)->get();

        return view('pertanyaan.show', ["pertanyaan" => $pertanyaan, "jawaban"=>$jawaban, "komentar"=>$komentar, "user"=>$user]);
    }

    public function store(Request $request){

        $validatedData = $request->validate([
        'judul' => 'required',
        'isi' => 'required|min:20',
        ]);

        if($validatedData){
        $pertanyaan = new Pertanyaan;

        $id = Auth::id();
    	$pertanyaan->judul = $request->judul;
    	$pertanyaan->isi = $request->isi;
    	$pertanyaan->tag = $request->tag;
    	$pertanyaan->user_id = $id;

    	$pertanyaan->save();
        }

    	return redirect()->route('pertanyaan.list');

    }

    public function edit($id){
        $pertanyaan = Pertanyaan::where("id", $id)->first();
        return view('pertanyaan.edit', ["pertanyaan" => $pertanyaan]);
    }

    public function update(Request $request, $id){
        $pertanyaan = Pertanyaan::find($id);
        $pertanyaan->judul = $request->judul;
        $pertanyaan->isi = $request->isi;
        $pertanyaan->tag = $request->tag;
        $pertanyaan->save();

        return redirect()->route('pertanyaan.list');
    }

    public function delete($id){
        Pertanyaan::destroy($id);
        return redirect()->route('pertanyaan.list');
    }

    public function upvote($user_id, $tanya_id){
        $user_auth = Auth::id();
        $vote = Vote::where('user_id', $user_auth)->where('pertanyaan_id', $tanya_id)->first();
        // $jawabantepat = Jawaban::where('id', $answer_id)->where('paling_tepat', 1)->first();
        // dd($vote);
        if (!$vote){

            $vote = new Vote;
            $vote->user_id = $user_auth;
            $vote->pertanyaan_id = $tanya_id;
            $vote->save();
            $user = User::find($user_id);
            $user->poin_reputasi = $user->poin_reputasi + 10;
            $user->save();
            $pertanyaan = Pertanyaan::find($tanya_id);
            $pertanyaan->poin_vote = $pertanyaan->poin_vote + 1;
            $pertanyaan->save();
        }

        $pertanyaan = Pertanyaan::find($tanya_id);
        $jawaban = Jawaban::where('pertanyaan_id', $pertanyaan->id )->orderBy('id','desc')->get();

        $komentar = Komentar::where('pertanyaan_id', $pertanyaan->id)->orderBy('id','desc')->get();
        $user = User::where('id',$pertanyaan->user_id)->get();

        return view('pertanyaan.show', ["pertanyaan" => $pertanyaan, "jawaban"=>$jawaban, "komentar"=>$komentar, "user"=>$user]);
    }

    public function downvote($user_id, $tanya_id){
        $user = User::find($user_id);
        $user->poin_reputasi = $user->poin_reputasi - 1;
        $user->save();
        $pertanyaan = Pertanyaan::find($tanya_id);
        $jawaban = Jawaban::where('pertanyaan_id', $pertanyaan->id )->orderBy('id','desc')->get();

        $komentar = Komentar::where('pertanyaan_id', $pertanyaan->id)->orderBy('id','desc')->get();
        $user = User::where('id',$pertanyaan->user_id)->get();

        return view('pertanyaan.show', ["pertanyaan" => $pertanyaan, "jawaban"=>$jawaban, "komentar"=>$komentar, "user"=>$user]);
       
    }

}
















