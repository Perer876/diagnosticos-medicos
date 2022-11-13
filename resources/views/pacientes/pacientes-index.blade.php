<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Pacientes</h3>
                <p class="text-subtitle text-muted">Administra los pacientes.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <x-breadcrumb>
                    <x-breadcrumb.item value="Dashboard" href="{{ route('dashboard') }}"/>
                    <x-breadcrumb.item value="Pacientes" active/>
                </x-breadcrumb>
            </div>
        </div>
    </x-slot>

    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Listado</h4>
                <a class="btn btn-success rounded-pill" href="{{ route('pacientes.create') }}">
                    Nuevo paciente
                    <i class="bi bi-person-plus"></i>
                </a>
            </div>
            <div class="card-content">
                <div class="table-responsive">
                    <table class="table align-middle table-lg mb-0 ">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Sexo</th>
                            <th>Fecha nacimiento</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pacientes as $paciente)
                            <tr>
                                <td class="text-bold-500">
                                    <a href="{{ route('pacientes.show', $paciente) }}">
                                        {{ $paciente->identificacion->nombre }}
                                    </a>
                                </td>
                                <td class="text-bold-500"><x-direccion :usuario="$paciente"/></td>
                                <td>{{ $paciente->sexo->name }}</td>
                                <td>{{ $paciente->fecha_nacimiento->format('Y/m/d') }}</td>
                                <td class="text-center">@include('pacientes.paciente-acciones', ['$paciente' => $paciente])</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @empty($pacientes->all())
                    <div class="text-center p-5">No hay pacientes</div>
                @endempty
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
