<!-- Nav -->
      <div id="nav">
        <!-- Main Nav -->
        <div id="nav-fixed">
          <div class="container">
            <!-- logo -->
            <div class="nav-logo">
              <a href="" class="logo"><img src="" alt=""></a>
            </div>
            <!-- /logo -->

            <!-- nav -->
            <ul class="nav-menu nav navbar-nav">
              <li><a href="{{ route('pertanyaan.list') }}">Home</a></li>
              <li><a href="">News</a></li>
              <li><a href="">Popular</a></li>
              <li class="cat-1"><a href="">Laravel</a></li>
              <li class="cat-2"><a href="">Codeigniter</a></li>
              <li class="cat-3"><a href="">Css</a></li>
              <li class="cat-4"><a href="">Javascript</a></li>
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
                                              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                          </li>
                                      @endif
                                  @else
                                      <li class="nav-item dropdown">
                                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                              {{ strtoupper(Auth::user()->name) }} <span style="color: green;">({{ Auth::user()->poin_reputasi }})</span><span class="caret"></span>
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
                          </div><br>


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
              <a class="post-img" href=""><img src="{{ ('/img/widget-2.jpg')}} " alt=""></a>
              <div class="post-body">
                <h3 class="post-title"><a href="">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
              </div>
            </div>

            <div class="post post-widget">
              <a class="post-img" href=""><img src="{{ ('/img/widget-3.jpg')}} " alt=""></a>
              <div class="post-body">
                <h3 class="post-title"><a href="">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>
              </div>
            </div>

            <div class="post post-widget">
              <a class="post-img" href=""><img src="{{ ('/img/widget-4.jpg')}} " alt=""></a>
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
      