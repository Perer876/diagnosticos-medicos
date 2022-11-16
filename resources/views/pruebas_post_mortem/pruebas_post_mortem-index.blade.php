<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Pruebas post mortem</h3>
                <p class="text-subtitle text-muted">Administra las pruebas post mortem</p>
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
                <a class="btn btn-success rounded-pill" href="{{route('pruebas_post_mortem.create')}}">
                    Nueva prueba
                    <i class="bi bi-clipboard2-plus"></i>
                </a>
            </div>
            <div class="card-content">
                <div class="table-responsive">
                    <table class="table mb-0 table-lg">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pruebasPostMortem as $pruebaPostMortem)
                                <tr>
                                    <td class="text-bold-500">{{ $pruebaPostMortem->nombre }}</td>
                                    <td class="text-bold-500">{{ $pruebaPostMortem->descripcion }}</td>
                                    <td>
                                        <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                            <a href="{{route('pruebas_post_mortem.edit', $pruebaPostMortem->id)}}" class="btn btn-sm icon btn-primary"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('pruebas_post_mortem.destroy', $pruebaPostMortem) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm icon btn-danger"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                                                    <i class="bi bi-trash"></i></button>
                                            </form>
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
    @include('plugins.tooltips')
</x-app-layout>
