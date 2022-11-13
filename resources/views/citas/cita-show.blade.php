<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Cita</h3>
                <p class="text-subtitle text-muted">Información de la cita</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <x-breadcrumb>
                    <x-breadcrumb.item value="Dashboard" href="{{route('dashboard')}}"/>
                    <x-breadcrumb.item value="Cita" active />
                </x-breadcrumb>
            </div>
        </div>
    </x-slot>

    <section class="section row gx-4">
        <div class="col-12 col-md-6">
            <div class="card ">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">
                        <i class="bi bi-calendar2-event"></i>
                        Cita
                    </h4>
                    @include('citas.cita-acciones', compact('cita'))
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="card-text text-center mb-0">
                                    <small>Paciente</small>
                                </p>
                                <h4 class="card-title text-center">
                                    <a href="{{ route('pacientes.show', $cita->paciente) }}" class="link-dark">
                                        {{ $cita->paciente->identificacion->nombre }}
                                    </a>
                                </h4>
                            </div>
                            <div>
                                <p class="card-text text-center mb-0">
                                    <small>Medico</small>
                                </p>
                                <h4 class="card-title text-center">
                                    <a href="{{ route('users.show', $cita->user) }}" class="link-dark">
                                        {{ $cita->user->identificacion->nombre }}
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <hr>
                        <div class="card-text">
                            <div class="d-flex justify-content-between">
                                <div class="text-center">
                                    <h6 class="card-subtitle">Fecha</h6>
                                    {{ $cita->fecha->format('Y/m/d') }}
                                </div>
                                <div class="text-center">
                                    <h6 class="card-subtitle">Hora</h6>
                                    {{ $cita->hora->format('h:i A') }}
                                </div>
                                <div class="text-center">
                                    <h6 class="card-subtitle">Estado</h6>
                                    <x-estado-cita :cita="$cita" />
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h6 class="card-subtitle">Motivo</h6>
                        <p class="card-text">
                            {{ $cita->motivo ?? 'No especificado' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
