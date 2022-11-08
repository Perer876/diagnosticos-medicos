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

    <section class="section row">
        <div class="card col-12 col-md-6">
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
                                <span>{{ $paciente->fecha_nacimiento }}</span>
                            </div>
                            <div class="text-center">
                                <h6 class="card-subtitle">Dirección</h6>
                                <x-direccion :usuario="$paciente" />
                            </div>
                        </div>
                    </p>
                    <hr>
                    <p class="card-text">
                        <h6 class="card-subtitle">Antecedentes familiares</h6>
                        {{ $paciente->antecedentes_familiares }}
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
