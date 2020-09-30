<header class="dt-header">

    <!-- Header container -->
    <div class="dt-header__container">

        <!-- Brand -->
        <div class="dt-brand">

            <!-- Brand tool -->
            <div class="dt-brand__tool" data-toggle="main-sidebar">
                <div class="hamburger-inner"></div>
            </div>
            <!-- /brand tool -->

            <!-- Brand logo -->
            <span class="dt-brand__logo">
        <a class="dt-brand__logo-link" href="">
          <img class="dt-brand__logo-img d-none d-sm-inline-block"
               src="{{asset('drift/default/assets/images/logo.png')}}" alt="Drift">
          <img class="dt-brand__logo-symbol d-sm-none" src="{{asset('drift/default/assets/images/logo-symbol.png')}}"
               alt="Drift">
        </a>
      </span>
            <!-- /brand logo -->

        </div>
        <!-- /brand -->

        <!-- Header toolbar-->
        <div class="dt-header__toolbar">


            <!-- Header Menu Wrapper -->
            <div class="dt-nav-wrapper">

                <!-- Header Menu -->
                <ul class="dt-nav">
                    <li class="dt-nav__item dropdown">
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
                    <!-- Dropdown Link -->
                        <a href="#" class="dt-nav__link dropdown-toggle no-arrow dt-avatar-wrapper"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="dt-avatar size-30"
                                 src="{{asset('drift/default/assets/images/user-avatar/domnic-harris.jpg')}}"
                                 alt="Domnic Harris">
                            <span class="dt-avatar-info d-none d-sm-block">
                <span class="dt-avatar-name"> {{ Auth::user()->name }}</span>
              </span> </a>
                        <!-- /dropdown link -->

                        <!-- Dropdown Option -->
                        <div class="dropdown-menu dropdown-menu-right">

                            <div
                                class="dt-avatar-wrapper flex-nowrap p-6 mt--5 bg-gradient-purple text-white rounded-top">
                                <img class="dt-avatar"
                                     src="{{asset('drift/default/assets/images/user-avatar/domnic-harris.jpg')}}"
                                     alt="Domnic Harris">
                                <span class="dt-avatar-info">
                  <span class="dt-avatar-name"> {{ Auth::user()->name }}</span>
                </span>
                            </div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                @endguest
                <!-- /dropdown option -->

                    </li>
                </ul>
                <!-- /header menu -->
            </div>
            <!-- Header Menu Wrapper -->

        </div>
        <!-- /header toolbar -->

    </div>
    <!-- /header container -->

</header>
