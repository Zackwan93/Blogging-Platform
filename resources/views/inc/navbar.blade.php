
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'SilverLining') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                      <a class="nav-link" href="/">Home </a>
                    </li>

                    <li class="nav-item mr-auto">
                      <a class="nav-link" href="/about">About</a>
                    </li>

                    <li class="nav-item dropdown mr-auto">
                      <a class="nav-link dropdown-toogle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog</a>
                      <div class="dropdown-menu" aria-labelledby="dropdown01">
                        
                        <a class="dropdown-item" href="/posts">Blog</a>
                      </div>
                    </li>

                    
                </ul>
                  
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>  
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="dropdown active">
                                <a  class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/posts/create" >Create Post</a>
                                    <a class="dropdown-item" href="/workers/create">Create Job</a>
                                    <a class="dropdown-item" href="/stocks/create">Create Stock</a>
                                    <a class="dropdown-item" href="/workers">Job List</a>
                                    <a class="dropdown-item" href="/stocks">Stock Management List</a>                                    
                                    <a class="dropdown-item" href="/dashboard">My Dashboard</a>

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
            </div>
        </nav>