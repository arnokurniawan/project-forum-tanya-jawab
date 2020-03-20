@extends('layouts.master')

@section('pertanyaan')
    <h3>{{ $pertanyaan->judul }}</h3>
    <p>{{ $pertanyaan->isi }}</p>
    <span>tag : {{ $pertanyaan->tag }} </span>
@endsection

  {{-- {{  dd($komentar[5])}} --}}
  @section('komentarPertanyaan')

      @foreach($komentar as $komen)
        @if(empty($komen['jawaban_id']) )
        <blockquote>  
          <div class="media">
            <div class="media-left">
            </div>
            <div class="media-body">
              <div class="media-heading">                
              </div>
              <p><i><small>{{ $komen['isi'] }}</small></i></p>
                                        
            </div>
          </div>
        </blockquote>
        @endif
      @endforeach

  @endsection
    
     
            

    
    <!-- /comment -->
