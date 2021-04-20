	<header class="header-area main-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo-area">
                        <a href="{{ route('index') }}"><img height="50px" src="/../Job_Portal/public/assets/images/logo.png" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="custom-navbar">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="main-menu">
                        <ul>
                            @guest
                            <li class="active"><a href="{{ route('index') }}">home</a></li>
                            <li><a href="{{ route('job.index') }}">Jobs</a></li>
                            <li><a href="#">Training</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('graphics.design') }}">Graphics Design</a></li>
                                    <li><a href="{{ route('digital.marketing') }}">Digital Marketing</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('quiz.index') }}">Quiz</a></li>
                            <li><a href="{{ route('contact') }}">contact</a></li>
                            <li class="menu-btn">
                                <a class="login" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                 <a class="template-btn" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            @endguest
                            @auth
                            <li class="active"><a href="{{ route('index') }}">home</a></li>
                            <li><a href="{{ route('profile.index') }}">Profile</a></li>
                            @if(auth()->user()->is_admin == 0)
                            <li><a href="{{ route('resume') }}">Resume</a></li>
                            <li><a href="#">Circular</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('job.index') }}">Jobs</a></li>
                                    <li><a href="{{ route('myapplication.index') }}">My Applications</a></li>
                                </ul>
                            </li>
                            @endif
                            @if(auth()->user()->is_admin == 1)
                            <li><a href="#">Circular</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('job.index') }}">Jobs</a></li>
                                    <li><a href="{{ route('myjob.index') }}">My Jobs</a></li>
                                    <li><a href="{{ route('applicant.index') }}">Applicants</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('user.index') }}">User</a></li>
                            <li><a href="{{ route('quizquestion.index') }}">Quiz</a></li>
                            @endif
                            @if(auth()->user()->is_admin == 0)
                            <li><a href="#">Training</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('graphics.design') }}">Graphic Design</a></li>
                                    <li><a href="{{ route('digital.marketing') }}">Digital Marketing</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('quiz.index') }}">Quiz</a></li>
                            @endif
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                            <li><a href="#" class="nav-link dropdown-toggle">{{ Auth::user()->name }}</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('profile.index') }}">Profile</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
