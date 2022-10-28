<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Usuarios</h3>
                <p class="text-subtitle text-muted">Administra tus usuarios</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
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
                    <table class="table mb-0 table-lg">
                        <thead>
                            <tr>
                                <th>Alias</th>
                                <th>Nombre</th>
                                <th>Rol</th>
                                <th>Ubicación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-bold-500">Perer876</td>
                                <td class="text-bold-500">Oscar Eduardo Arámbula Vega</td>
                                <td>Medico</td>
                                <td class="text-bold-500">Jalisco, México</td>
                                <td>
                                    <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                        <a href="{{route('users.edit', 0)}}" class="btn btn-sm icon btn-primary"
                                           data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="{{route('users.destroy', 0)}}" class="btn btn-sm icon btn-danger"
                                           data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    @include('scripts.tooltips')
</x-app-layout>
