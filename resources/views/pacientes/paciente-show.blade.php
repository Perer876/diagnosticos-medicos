<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Paciente</h3>
                <p class="text-subtitle text-muted">Información del paciente</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <x-breadcrumb>
                    <x-breadcrumb.item value="Dashboard" href="{{ route('dashboard') }}"/>
                    <x-breadcrumb.item value="Pacientes" href="{{ route('pacientes.index') }}" />
                    <x-breadcrumb.item value="{{ $paciente->identificacion->nombre }}" active />
                </x-breadcrumb>
            </div>
        </div>
    </x-slot>

    <section class="section row gx-4">
        <div class="col-12 col-md-6">
            <div class="card ">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">
                        <i class="bi bi-person-circle"></i>
                        Información
                    </h4>
                    @include('pacientes.paciente-acciones', ['paciente' => $paciente])
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title text-center">{{ $paciente->identificacion->nombre }}</h4>
                        <h6 class="text-center fw-light">{{ $paciente->sexo->name }}</h6>
                        <hr>
                        <p class="card-text">
                            <div class="d-flex justify-content-between">
                                <div class="text-center">
                                    <h6 class="card-subtitle">Fecha de nacimiento</h6>
                                    <span>{{ $paciente->fecha_nacimiento->format('Y/m/d') }}</span>
                                </div>
                                <div class="text-center">
                                    <h6 class="card-subtitle">Dirección</h6>
                                    <x-direccion :usuario="$paciente" />
                                </div>
                            </div>
                        </p>
                        <hr>
                        <h6 class="card-subtitle">Antecedentes familiares</h6>
                        <p class="card-text">
                        {{ $paciente->antecedentes_familiares }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card ">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">
                        <i class="bi bi-calendar2-event"></i>
                        Citas
                    </h4>
                    <a class="btn btn-success rounded-pill" href="{{ route('pacientes.citas.create', $paciente) }}">
                        Agendar
                        <i class="bi bi-plus-lg"></i>
                    </a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="list-group">
                            @foreach($paciente->citas()->with(['user.identificacion', 'estado'])->get() as $cita)
                                <a href="{{ route('citas.show', $cita->id) }}" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">
                                            <i class="bi bi-person-workspace"></i>
                                            {{ $cita->user->identificacion->nombre }}
                                        </h5>
                                        <small>
                                            <x-estado-cita :cita="$cita"/>
                                        </small>
                                    </div>
                                    <div class="d-flex w-100 justify-content-between">
                                        <small>{{ $cita->fecha->format('Y/m/d') }}</small>
                                        <small>{{ $cita->hora->format('h:i A') }}</small>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
