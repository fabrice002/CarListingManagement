<div class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand"href="{{ route('Car.index') }}"><img src="{{ asset('assets/image/logo.png') }}"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Car.index') }}">Accueil</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('Car.create') }}">Ajouter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('Order.show', Auth::user()->id) }}">Liste</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.edit') }}">Profil</a>
                        </li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                            this.closest('form').submit();">Deconnexxion</a>
                            </li>
                        </form>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Créer Compte</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                        </li>
                    @endauth
                </ul>
                <form class="form-inline my-2 my-lg-0">
                </form>
            </div>
        </nav>
    </div>
</div>
