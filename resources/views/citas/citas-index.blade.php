<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Citas</h3>
                <p class="text-subtitle text-muted">Ver las citas proximas</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <x-breadcrumb>
                    <x-breadcrumb.item value="Dashboard" href="{{route('dashboard')}}"/>
                    <x-breadcrumb.item value="Citas" active/>
                </x-breadcrumb>
            </div>
        </div>
    </x-slot>

    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Listado</h4>
            </div>
            <div class="card-content">
                <div class="table-responsive">
                    <table class="table align-middle table-lg mb-0 ">
                        <thead>
                        <tr>
                            <th>Paciente</th>
                            <th>Medico</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($citas as $cita)
                            <tr>
                                <td class="text-bold-500">
                                    <a href="{{ route('pacientes.show', $cita->paciente) }}">
                                        {{ $cita->paciente->identificacion->nombre }}
                                    </a>
                                </td>
                                <td class="text-bold-500">
                                    <a href="{{ route('users.show', $cita->user) }}">
                                        {{ $cita->user->identificacion->nombre }}
                                    </a>
                                </td>
                                <td>
                                    {{ $cita->fecha->format('Y/m/d') }}
                                </td>
                                <td>
                                    {{ $cita->hora->format('h:i A') }}
                                </td>
                                <td>
                                    <x-estado-cita :cita="$cita" />
                                </td>
                                <td class="text-center">
                                    @include('citas.cita-acciones-indice', ['cita' => $cita])
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @empty($citas->all())
                        <div class="text-center p-5">No hay citas</div>
                    @endempty
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
