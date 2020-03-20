<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Forum Web Developer</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet"> 

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/bootstrap.min.css')}}"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css')}}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/style.css')}}"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    </head>
  <body onload="hideFunc()">
    
    <!-- Header -->
    <header id="header">
      <!-- Nav -->
      @include('layouts.partials.main_nav')
      <!-- /Nav -->
      
      <!-- Page Header -->
      <div id="post-header" class="page-header">
        <div class="background-img" style="background-image: url('{{ asset('/img/post-page.jpg') }}')"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-10">
              <div class="post-meta">
                <a class="post-category cat-2" href=""></a>
                <span class="post-date"></span>
              </div>
              <h1></h1>
            </div>
          </div>
        </div>
      </div>
      <!-- /Page Header -->
    </header>
    <!-- /Header -->

    <!-- section -->
    <div class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">
          <!-- Post content -->
          <div class="col-md-8">
            <div class="section-row sticky-container">
              <div class="main-post">
                  @yield('pertanyaan')  
              </div>
              @if ($user[0]->name == Auth::user()->name)
                    <span><a href="{{ route('pertanyaan.edit', ["id" => $pertanyaan->id] ) }}  "><button>EDIT PERTANYAAN</button></a></span>

              @endif

              <div align="right">
                <form action= "{{ route('pertanyaan.upvote', ["user_id" => $pertanyaan->user_id, "tanya_id" => $pertanyaan->id ] ) }} " method="post"> 
                @csrf              
                <input type="submit" name="submit" value="Upvote">
                </form>
              
              </div >
              <div align="right">
              <form action= "{{ route('pertanyaan.downvote', ["user_id" => $pertanyaan->user_id, "tanya_id" => $pertanyaan->id ] ) }} " method="post"> 
              @csrf
            
              <input type="submit" name="submit" value="Downvote">
              </form>
              </div>
                {{-- {{  dd($komentar[5])}} --}}
                  @yield('komentarPertanyaan')

                  {{-- @endforeach --}}
                  <blockquote> 
                  <div id='JawabCommentForm'>
                              <form action="{{ route('komentar.store', ["tanya_id" => $pertanyaan['id'], "jawab_id" => 0, "kategori" => 'pertanyaan' ]) }}" method="post">
                              @csrf
                                <textarea name="isi" cols="20" rows="3" placeholder="Komentari Pertanyaan..."></textarea><br>
                                <input type="submit" name="submit" value="Submit Komentar">
                          {{--       <button >Cancel</button>
                          --}}</form>
                  </div>
                  </blockquote> 

                    
            <div class="post-shares sticky-shares">
                <a href="#" class="share-facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="share-twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="share-google-plus"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="share-pinterest"><i class="fa fa-pinterest"></i></a>
                <a href="#" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-envelope"></i></a>
              </div>
            </div>

            <!-- ad -->
            
            <!-- ad -->
            
            <!-- author -->
            <div class="section-row">
              <div class="post-author">
                <div class="media">
                  <div class="media-left">
                    <img class="media-object" src="{{ ('/img/author.png')}} " alt="">
                  </div>
                  <div class="media-body">
                    <div class="media-heading">
                      <h3>{{ ucfirst($user[0]->name) }} <span style="color: green;">({{ $user[0]->poin_reputasi }})</span></h3>
                    </div>
                    
                    <ul class="author-social">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                      <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- /author -->
            <!-- Form Jawaban-->

            <!--
            <div id='JawabanForm'>
              <form action="{{-- {{ route('jawaban.store', ["id" => $pertanyaan->id ]) }}" mthod="post">
              @csrf --}}
                <textarea name="isi" cols="50" rows="10" placeholder="Masukkan Jawaban Anda..."></textarea>
                <input type="submit" name="submit" value="Submit Jawaban">
              </form>
              <div><button onclick="hideFunc()">Cancel</button></div>
              <hr>
            </div>
-->
            <div id='JawabanForm' class="section-row">
              <div class="section-title">
                <h3>Masukkan Jawaban </h3>
              </div>
              <form class="post-reply" action="{{ route('jawaban.store', ["id" => $pertanyaan->id ]) }}" method="post">
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <!-- tidak boleh pakai atribut REQUIRED karena menyebabkan tombol submit tidak bekerja -->
                      <textarea class="input" name="isi" id="isiJawaban" placeholder="Masukkan Jawaban Anda ..." ></textarea>
                    </div>
                    <button class="primary-button">Submit Jawaban</button>
                  </div>
                </div>
              </form>
            </div>

              <div class="clearfix visible-md visible-lg"></div>
              
              <div class="">
                <div class="section-row"><br>
                  <button onclick="showFunc()" class="primary-button center-block">BUAT JAWABAN</button>
                </div>
              </div>



            <!-- comments -->
            <div class="section-row">
                {{-- <div class="section-title">
                  <h2>3 Jawaban</h2>
                </div>
 --}}
              <div class="post-comments">
                <!-- Jawaban -->
        @if(!empty($jawaban))
{{--                             {{ dd($jawaban) }}
 --}}
          @foreach($jawaban as $jawab)
                {{-- <span>{{ $jawab->isi }} </span> --}}

            <div class="media">

                <div class="media-left">
                  <img class="media-object" src="{{ ('/img/avatar.png')}} " alt="">
                </div>
                  <div class="media-body">
                      <div class="media-heading">
                        <h4>John Doe</h4>
                        <span class="time">March 27, 2018 at 8:00 am</span>
                        <a href="#" class="reply">Reply</a>
                        {{-- @if (!empty($jawab->paling_tepat))
                          @if ($jawab->paling_tepat == 1)
                          <div align='right'><b><small><i>Jawaban Terbaik</i></small></b></div>
                          @endif
                        @endif --}}
                      </div>

                      <p>{!! $jawab->isi !!}</p>

                    <div align="right">
                      <form action= "{{ route('jawaban.upvote', ["user_id" => $pertanyaan->user_id, "tanya_id" => $pertanyaan->id, "answer_id" => $jawab->id] ) }} " method="post"> 
                        @csrf
                      
                        <input type="submit" name="submit" value="Upvote">
                        </form>
                    </div>

                    <div align="right">
                      <form action= "{{ route('jawaban.downvote', ["user_id" => $pertanyaan->user_id, "tanya_id" => $pertanyaan->id] ) }} " method="post"> 
                            @csrf
                          
                            <input type="submit" name="submit" value="Downvote">
                            </form>
                        </div>
                        @if ($user[0]->name == Auth::user()->name)
                          <div align="right">
                            <form action= "{{ route('jawaban.palingtepat', ["user_id" => $pertanyaan->user_id, "tanya_id" => $pertanyaan->id, "answer_id" => $jawab->id ] ) }} " method="post"> 
                            @csrf
                          
                            <input type="submit" name="submit" value="Paling Tepat">
                            </form>
                          </div>
                        @endif

                    @foreach($komentar as $komen)
                      @if(!empty($komen['jawaban_id']) )
                        {{-- {{  dd($komen['jawaban_id'])}} --}}
                        {{-- {{  dd($jawab->id)}} --}}
                      <!-- komentar -->
                        @if ($komen['jawaban_id'] == $jawab->id)

                            <div class="media">
                                    <div class="media-left">
                                      <img class="media-object" src="{{ ('/img/avatar.png')}} " alt="">
                                    </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <h5>John Doe</h5>
                                        <span class="time">March 27, 2018 at 8:00 am</span>
                                        <a href="#" class="reply">Reply</a>
                                    </div>
                                  {{-- {{  dd($komentar)}} --}}
                                        <p><small>{{ $komen['isi'] }}</small></p>
                                      
                                  <!--<div><button onclick="showJawabComment()">Beri Komentar</button></div>-->      
                                </div>
                            </div>
                        @endif
                      @endif
                  @endforeach
                                      
                    <!-- /comment -->
                        <blockquote>
                        <div id='JawabCommentForm'>
                                <form action="{{ route('komentar.store', ["tanya_id" => $pertanyaan->id, "jawab_id" => $jawab->id, "kategori" => 'jawaban' ]) }}" method="post">
                                @csrf
                                  <textarea name="isi" cols="20" rows="3" placeholder="Komentar Jawaban..."></textarea><br>
                                  <input type="submit" name="submit" value="Submit Komentar">
                            {{--       <button >Cancel</button>
                            --}}</form>
                        </div>
                        </blockquote>
                </div>
            </div>
                <!-- /comment -->
           @endforeach
          @endif            
              </div>
            </div>
            <!-- /comments -->

            <!-- reply -->
            <div class="section-row">
              <div class="section-title">
                <h2>Beri Jawaban </h2>
                {{-- <p>your email address will not be published. required fields are marked *</p> --}}
              </div>
              <form class="post-reply" action="{{ route('jawaban.store', ["id" => $pertanyaan->id ]) }}" method="post">
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea class="input" name="isi" id="isiJawaban2" placeholder="Masukkan Jawaban Anda ..."></textarea>
                    </div>
                    <button class="primary-button">Submit</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /reply -->
          </div>
          <!-- /Post content -->

          <!-- aside -->
          @include('layouts.partials.aside')
          <!-- /aside -->
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /section -->

    <!-- Footer -->
    <footer id="footer">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">
          <div class="col-md-5">
            <div class="footer-widget">
              <div class="footer-logo">
                <a href="" class="logo"><img src="{{ ('/img/logo.png')}} " alt=""></a>
              </div>
              <ul class="footer-nav">
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Advertisement</a></li>
              </ul>
              <div class="footer-copyright">
                <span>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="row">
              <div class="col-md-6">
                <div class="footer-widget">
                  <h3 class="footer-title">About Us</h3>
                  <ul class="footer-links">
                    <li><a href="">About Us</a></li>
                    <li><a href="#">Join Us</a></li>
                    <li><a href="">Contacts</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-6">
                <div class="footer-widget">
                  <h3 class="footer-title">Catagories</h3>
                  <ul class="footer-links">
                    <li><a href="">Web Design</a></li>
                    <li><a href="">PHP</a></li>
                    <li><a href="">Css</a></li>
                    <li><a href="">JavaScript</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="footer-widget">
              <h3 class="footer-title">Join our Newsletter</h3>
              <div class="footer-newsletter">
                <form>
                  <input class="input" type="email" name="newsletter" placeholder="Enter your email">
                  <button class="newsletter-btn"><i class="fa fa-paper-plane"></i></button>
                </form>
              </div>
              <ul class="footer-social">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
              </ul>
            </div>
          </div>

        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </footer>
    <!-- /Footer -->

<!-- fungsi menyambunyikan dan menampilkan form -->
<script>
  function hideFunc(){  
    document.getElementById("JawabanForm").style.display = 'none'
    document.getElementById("TanyaCommentForm").style.display = 'none'
    document.getElementById("JawabCommentForm").style.display = 'none'
  }

  function hidebuatJawaban(){
    document.getElementById("buatJawaban").style.display = 'none'
  }

  function showFunc(){
    document.getElementById("JawabanForm").style.display = 'block'
  }

  function showTanyaComment(){
    document.getElementById("TanyaCommentForm").style.display = 'block'
  }

  function showJawabComment(){
      document.getElementById("JawabCommentForm").style.display = 'block'
    }

</script>

    <!-- jQuery Plugins -->
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/main.js')}}"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script >tinymce.init({selector:'#isiJawaban'}); </script>
    <script >tinymce.init({selector:'#isiJawaban2'}); </script>

  </body>
</html>
