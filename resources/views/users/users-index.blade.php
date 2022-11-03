<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Usuarios</h3>
                <p class="text-subtitle text-muted">Administra tus usuarios</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <x-breadcrumb>
                    <x-breadcrumb.item value="Dashboard" href="{{route('dashboard')}}"/>
                    <x-breadcrumb.item value="Usuarios" active/>
                </x-breadcrumb>
            </div>
        </div>
    </x-slot>

    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Listado</h4>
                <a class="btn btn-success rounded-pill" href="{{route('users.create')}}">
                    Nuevo usuario
                    <i class="bi bi-person-plus"></i>
                </a>
            </div>
            <div class="card-content">
                <div class="table-responsive">
                    <table class="table align-middle table-lg mb-0 ">
                        <thead>
                        <tr>
                            <th>Alias</th>
                            <th>Nombre</th>
                            <th>Rol</th>
                            <th>Dirección</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td class="text-bold-500">
                                    <a href="{{ route('users.show', $usuario) }}">{{ $usuario->alias }}</a>
                                </td>
                                <td class="text-bold-500">{{ $usuario->identificacion->nombre }}</td>
                                <td>
                                    <x-rol :usuario="$usuario"/>
                                </td>
                                <td class="text-bold-500">
                                    <x-direccion :usuario="$usuario"/>
                                </td>
                                <td>
                                    @include('users.user-actions', ['user' => $usuario])
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @empty($usuarios->all())
                    <div class="text-center p-5">No hay usuarios</div>
                @endempty
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
