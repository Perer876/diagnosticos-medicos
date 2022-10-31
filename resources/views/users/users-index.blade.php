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
                    <x-breadcrumb.item value="Usuarios" active />
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
                                <td class="text-bold-500">{{ $usuario->alias }}</td>
                                <td class="text-bold-500">{{ $usuario->identificacion->nombre }}</td>
                                <td><x-rol :usuario="$usuario"/></td>
                                <td class="text-bold-500"><x-direccion :usuario="$usuario"/></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{route('users.edit', $usuario->id)}}"
                                           class="btn btn-sm icon btn-primary"
                                           data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{route('users.destroy', $usuario->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm icon btn-danger"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar"
                                            >
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                        <a href=""

                                           >
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    @include('scripts.tooltips')
</x-app-layout>
