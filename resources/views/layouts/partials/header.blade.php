<header>
    <nav class="navbar navbar-expand navbar-light ">
        <div class="container-fluid">
            <a href="#" class="burger-btn d-block">
                <i class="bi bi-justify fs-3"></i>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown me-3">
                        <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
{{--                            <span class="position-absolute top-25 start-75 translate-middle badge rounded-pill bg-danger">--}}
{{--                                1--}}
{{--                                <span class="visually-hidden">unread messages</span>--}}
{{--                            </span>--}}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <h6 class="dropdown-header">Notificaciones</h6>
                            </li>
                            <li>
                                <a class="dropdown-item">No hay notificaciones</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="user-name text-end me-3">
                                <h6 class="mb-0 text-gray-600">{{ Auth::user()->alias }}</h6>
                                <p class="mb-0 text-sm text-success">Online</p>
                            </div>
                            <div class="user-img d-flex align-items-center">
                                <div class="avatar avatar-md">
                                    <img src="{{ asset('/images/faces/1.jpg') }}" alt="Imagen de perfil">
                                </div>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li>
                            <h6 class="dropdown-header">Hola, {{ strtok(Auth::user()->alias, " ") }}</h6>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('users.show', auth()->user()) }}">
                                <i class="icon-mid bi bi-person me-2"></i>
                                Mi Perfil
                            </a>
                        </li>
                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <li>
                                <a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                    {{ __('API Tokens') }}
                                </a>
                            </li>
                        @endif
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item">
                                    <i class="icon-mid bi bi-box-arrow-left me-2"></i>
                                    Cerrar sesión
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
