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

    <section class="section row gx-4">
        <div class="col-12 col-md-6">
            <div class="card ">
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
        </div>
        @if($user->tieneRol('medico'))
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">
                        <i class="bi bi-person-workspace"></i>
                        Medico
                    </h4>
                    <a href="{{ route('medicos.edit', $user->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                        <i class="bi bi-pencil-square link-secondary"></i>
                    </a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <span class="card-text">
                            <h6 class="card-subtitle">Cédula</h6>
                            <x-cedula :medico="$user->medico" />
                            <h6 class="card-subtitle">Especialidades</h6>
                            <p>
                            @forelse($user->medico->especialidades()->pluck('nombre') as $especialidad)
                                <span class="badge bg-light-warning mb-2 me-1">{{ $especialidad }}</span>
                            @empty
                                <span class="fst-italic">Sin especialidades</span>
                            @endforelse
                            </p>
                        </span>
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
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="list-group">
                            @foreach($user->citas()->with(['paciente.identificacion', 'estado'])->get() as $cita)
                                <a href="{{ route('citas.show', $cita->id) }}" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">
                                            <i class="bi bi-heart-pulse"></i>
                                            {{ $cita->paciente->identificacion->nombre }}
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
        @endif
    </section>
</x-app-layout>
@include('plugins.tooltips')
