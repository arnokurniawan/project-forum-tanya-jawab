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
		<link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{ asset('/css/style.css') }}"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		
		<!-- Header -->
		<header id="header">
			<!-- Nav -->
			<div id="nav">
				<!-- Main Nav -->
				<div id="nav-fixed">
					<div class="container">
						<!-- logo -->
						<div class="nav-logo">
							<a href="" class="logo"><img src=""></a>
							<!-- <a href="" class="logo"><img src="/img/logo.png'"></a> -->
						</div>
						<!-- /logo -->

						<!-- nav -->
						<ul class="nav-menu nav navbar-nav">
							<li><a href="">News</a></li>
							<li><a href="">Popular</a></li>
							<li class="cat-1"><a href="">Laravel</a></li>
							<li class="cat-2"><a href="">Codeigniter</a></li>
							<li class="cat-3"><a href="">React JS</a></li>
							<li class="cat-4"><a href="">JavaScript</a></li>
						</ul>
						<!-- /nav -->
						
						<!-- search & aside toggle -->
						<div class="nav-btns">
							<button class="aside-btn"><i class="fa fa-bars"></i></button>
							<button class="search-btn"><i class="fa fa-search"></i></button>
							<div class="collapse navbar-collapse" id="navbarSupportedContent">
					                    <!-- Left Side Of Navbar -->
					                    <ul class="navbar-nav mr-auto">

					                    </ul>

					                    <!-- Right Side Of Navbar -->
					                    <ul class="navbar-nav ml-auto">
					                        <!-- Authentication Links -->
					                        @guest
					                            <li class="nav-item">
					                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
					                            </li><br>
					                            @if (Route::has('register'))
					                                <li class="nav-item">
					                                    <a class="nav-link" href="{{ route('register') }}">{{ 	__('Register') }}</a>
					                                </li>
					                            @endif
					                        @else
					                            <li class="nav-item dropdown">
					                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
					                                    {{ Auth::user()->name }} ( {{ (Auth::user()->poin_reputasi) ? Auth::user()->poin_reputasi:0 }} )<span class="caret"></span>
					                                </a>

					                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					                                    <a class="dropdown-item" href="{{ route('logout') }}"
					                                       onclick="event.preventDefault();
					                                                     document.getElementById('logout-form').submit();">
					                                        {{ __('Logout') }}
					                                    </a>

					                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					                                        @csrf
					                                    </form>
					                                </div>
					                            </li>
					                        @endguest
					                    </ul>
					                </div>
							<div class="search-form">
								<input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
								<button class="search-close"><i class="fa fa-times"></i></button>


							</div>
						</div>
						<!-- /search & aside toggle -->
					</div>
				</div>
				<!-- /Main Nav -->

				<!-- Aside Nav -->
				<div id="nav-aside">
					<!-- nav -->
					<div class="section-row">
						<ul class="nav-aside-menu">
							<li><a href="">Home</a></li>
							<li><a href="">About Us</a></li>
							<li><a href="#">Join Us</a></li>
							<li><a href="#">Advertisement</a></li>
							<li><a href="">Contacts</a></li>
						</ul>
					</div>
					<!-- /nav -->

					<!-- widget posts -->
					<div class="section-row">
						<h3>Recent Posts</h3>
						<div class="post post-widget">
							<a class="post-img" href=""><img src="{{ asset('/img/widget-2.jpg') }}"></a>
							<div class="post-body">
								<h3 class="post-title"><a href="">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
							</div>
						</div>

						<div class="post post-widget">
							<a class="post-img" href=""><img src="{{ asset('/img/widget-3.jpg') }}"></a>
							<div class="post-body">
								<h3 class="post-title"><a href="">Why  Is The Coolest Kid On The Backend Development Block!</a></h3>
							</div>
						</div>

						<div class="post post-widget">
							<a class="post-img" href=""><img src="{{ asset('/img/widget-4.jpg') }}"></a>
							<div class="post-body">
								<h3 class="post-title"><a href="">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
							</div>
						</div>
					</div>
					<!-- /widget posts -->

					<!-- social links -->
					<div class="section-row">
						<h3>Follow us</h3>
						<ul class="nav-aside-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
					</div>
					<!-- /social links -->

					<!-- aside nav close -->
					<button class="nav-aside-close"><i class="fa fa-times"></i></button>
					<!-- /aside nav close -->
				</div>
				<!-- Aside Nav -->
			</div>
			<!-- /Nav -->
			
			<!-- Page Header -->
			<div class="page-header">
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<ul class="page-header-breadcrumb">
								<li><a href="">Home</a></li>
								<li>Forum</li>
							</ul>
							<h1>Forum Web Developer</h1>
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
					<div class="col-md-8">
						<div class="row">
							<!-- post -->
							<div class="col-md-12">
								<div class="post post-thumb">
									<a class="post-img" href="#"><img src="{{ asset('/img/post-1.jpg') }}"></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="#"></a>
											<span class="post-date"></span>
										</div>
										<h3 class="post-title"><a href=""></a></h3>
									</div>
								</div>
							</div>
							<!-- /post -->
										
							<!-- post -->
							
							<!-- /post -->
							
							<div class="clearfix visible-md visible-lg"></div>
							
							<div class="col-md-12">
								<div class="section-row"><br>
									<a href="{{ route('pertanyaan.create') }} "><button class="primary-button center-block">BUAT PERTANYAAN</button></a>
								</div>
							</div>				

							
							@foreach($pertanyaan as $key=>$question)

							<!-- post -->
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href=""><img src="{{ asset('/img/post-'.($key+1).'.jpg') }}"></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="#"></a>
											{{-- {{ dd($question->created_at) }} --}}
											
											
											<span class="post-date">{{ $tanggal = substr(($question->created_at), 0, 10) }}</span>
										</div>
										<h3 class="post-title">
											<a href="{{ route('pertanyaan.show', ["id" => $question->id] ) }} "> {{ $question->judul }} </a></h3>
										<!--  gunakan tanda !! untuk mengabaikan tag html akibat penggunaan TINY teks editor-->
										<p>{!! $question->isi !!}</p>
										<span></span><small>tag: <b>{{ $question->tag }}</b> </small> </span>
										@if (Auth::user())
											@if (Auth::user()->name == 'admin')
											<span align='right'>
												<form action= "{{ route('pertanyaan.delete', ["id" => $question->id]) }} " method="post" onSubmit="return confirm('Anda Akan Menghapus Pertanyaan?') "> 
												@csrf
												@method('DELETE')
												<input type="submit" name="submit" value="HAPUS">
												</form>
											</span>
											@endif
										@endif
										
									</div>
								</div>
							</div>
							<!-- /post -->
							@endforeach
														
							
						</div>
					</div>
					
					<div class="col-md-4">
						
						<!-- post widget -->
						<div class="aside-widget">
							
						</div>
						<!-- /post widget -->
						
						<!-- catagories -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Catagories</h2>
							</div>
							<div class="category-widget">
								<ul>
									<li><a href="#" class="cat-1">Laravel<span>340</span></a></li>
									<li><a href="#" class="cat-2">Codeigniter<span>74</span></a></li>
									<li><a href="#" class="cat-4">React<span>41</span></a></li>
									<li><a href="#" class="cat-3">Bootstrap<span>35</span></a></li>
								</ul>
							</div>
						</div>
						<!-- /catagories -->
						
						<!-- tags -->
						<div class="aside-widget">
							<div class="tags-widget">
								<ul>
									<li><a href="#">Laravel</a></li>
									<li><a href="#">React</a></li>
									<li><a href="#">Vue</a></li>
									<li><a href="#">Codeigniter</a></li>
									<li><a href="#">PHP</a></li>
									<li><a href="#">Design</a></li>
									<li><a href="#">Development</a></li>
									<li><a href="#">JavaScript</a></li>
									<li><a href="#">Website</a></li>
								</ul>
							</div>
						</div>
						<!-- /tags -->
						
						<!-- archive -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Archive</h2>
							</div>
							<div class="archive-widget">
								<ul>
									<li><a href="#">Jan 2020</a></li>
									<li><a href="#">Feb 2020</a></li>
									<li><a href="#">Mar 2020</a></li>
								</ul>
							</div>
						</div>
						<!-- /archive -->
					</div>
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
								<a href="" class="logo"><img src=""></a>
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
										<li><a href="">Laravel</a></li>
										<li><a href="">Codeigniter</a></li>
										<li><a href="">React</a></li>
										<li><a href="">Bootstrap</a></li>
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

		<!-- jQuery Plugins -->

		<script>
		function confirmDelete() {
		  confirm("Anda Akan Menghapus Pertanyaan ?");
		}
		</script>



		<script src="{{ asset('/js/jquery.min.js') }}"></script>
		<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('/js/main.js') }}"></script>
		
	</body>
</html>
