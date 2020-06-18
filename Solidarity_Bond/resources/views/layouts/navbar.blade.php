<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('accueil') }}">
        <img src="{{ asset('assets/img/logo_cesi_cropped.png') }}">
        {{env('APP_NAME')}}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-1 text-center ">

                <li class="nav-item">
                <a class="nav-link" href="{{route('a-propos')}}">À propos</a>
                <li class="nav-item">
                <a class="nav-link" href="{{route('boutique')}}">Boutique</a>
                <li class="nav-item">
                <a class="nav-link" href="{{route('partenaires')}}">Nos partenaires</a>
                <li class="nav-item">
                <a class="nav-link" href="{{route('contact')}}">Contact</a>

            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto text-center">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item ">
                        <a href="{{ route('login') }}" class="btn btn-cesi mb-2 ml-1" role="button" >{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))

                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="btn btn-cesi ml-1 mt-auto" role="button" >{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
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
    </div>
</nav>