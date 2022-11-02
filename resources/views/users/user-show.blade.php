<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Usuario</h3>
                <p class="text-subtitle text-muted">Información del usuario</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <x-breadcrumb>
                    <x-breadcrumb.item value="Dashboard" href="{{route('dashboard')}}"/>
                    <x-breadcrumb.item value="Usuarios" href="{{ route('users.index') }}" />
                    <x-breadcrumb.item value="{{ $user->alias }}" active />
                </x-breadcrumb>
            </div>
        </div>
    </x-slot>

    <section class="section row">
        <div class="card col-12 col-md-6">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">
                    <i class="bi bi-person-circle"></i>
                    Información
                </h4>
                @include('users.user-actions', ['user' => $user])
            </div>
            <div class="card-content">
                <div class="card-body">
                    <h4 class="card-title text-center">{{ $user->identificacion->nombre }}</h4>
                    <h6 class="text-center fw-light">{{ $user->alias }}</h6>
                    <hr>
                    <p class="card-text">
                        <div class="d-flex justify-content-between">
                            <div class="text-center">
                                <h6 class="card-subtitle">Rol</h6>
                                <x-rol :usuario="$user" />
                            </div>
                            <div class="text-center">
                                <h6 class="card-subtitle">Dirección</h6>
                                <x-direccion :usuario="$user" />
                            </div>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
