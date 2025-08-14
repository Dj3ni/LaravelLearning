
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tuto Laravel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('index') }}">Home</a>
                </li>
                <li class="nav-item">
                <a 
                    @class([
                    'nav-link',
                    'active' => request()->route()->getName() === 'blog.index' 
                ])
                    href="{{ route('blog.index') }}">Blog</@class>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @auth
                        {{ Auth::user()->name }}
                    @endauth
                    @guest
                        Guest
                    @endguest
                </a>
                <ul class="dropdown-menu">
                    @guest
                        <li><a class="dropdown-item" href="{{ route('auth.login')}}">Login</a></li>
                        <li><a class="dropdown-item" href="#">Register</a></li>
                    @endguest
                    @auth
                        <li>
                            <form action="{{ route('auth.logout')}}" method="POST" class="nav-item">
                                @method("delete")
                                @csrf
                                <button class="dropdown-item">Logout</button>
                            </form>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('user.show',["user"=>Auth::user()->id])}}">Profile</a></li>
                    @endauth
                </ul>
                </li>

            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
        </div>
    </nav>
